<?php 

namespace App\Services;

use App\Provas;
use App\Repositories\CorredoresProvasRepository;
use App\Validators\CorredoresProvasValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use App\Services\CorredoresService;
use App\Services\ProvasService;
use Exception;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class CorredoresProvasService {

    private $respository;
    private $validator;
    private $corredorService;
    private $provaService;

    public function __construct(CorredoresProvasRepository $respository, CorredoresProvasValidator $validator, CorredoresService $corredorService, ProvasService $provaService){
        $this->respository = $respository;
        $this->validator = $validator;
        $this->corredorService = $corredorService;
        $this->provaService = $provaService;
    }


    public function getAll(){

        $corredoresProvas = $this->respository->with(['corredores','provas'])->all();

        return $corredoresProvas;

    }

    public function get($id){

       return $this->respository->with(['corredores','provas'])->find($id);

    }

    private function regras($request) {
        $corredor = $this->corredorService->get($request->corredores_id);

        $dataNascimento = \Carbon\Carbon::parse($corredor->data_nascimento);
        $anos = \Carbon\Carbon::now()->diffInYears($dataNascimento);

        
        if ($anos < 18) {
            return ['success' => false, 'messages' => 'O corredor é menor de idade'];
        }

        $provasCorredor = $this->respository->findWhere(['corredores_id' => $request->corredores_id]);

        $provaAtual = $this->provaService->get($request->provas_id);

        if ($provasCorredor->count() > 1) {
            foreach($provasCorredor as $prova) {

                if ($provaAtual->data === $prova->provas->data) {
                    return ['success' => false, 'messages' => 'O corredor já possui uma prova nesse mesmo dia'];
                }
            }
        }
      
        return ['success' => true];

    }

    public function store(Request $request) {
        
        try {
            $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $regras = $this->regras($request);
         
            if ($regras['success'] === false) {
                return $regras;
            }

            $this->respository->create($request->all());
            
        
        } catch (Exception $e) {

            switch(get_class($e))
            {
                case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
                default : return ['success' => false, 'messages' => get_class($e)];
            }
        }
    }

    public function update(Request $request, $id) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

           $regras = $this->regras($request);

           if ($regras['success'] === false) {
                return $regras;
            }

           $this->respository->update($request->all(), $id);
        } catch (Exception $e) {
            switch(get_class($e))
            {
                case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
                default : return ['success' => false, 'messages' => get_class($e)];
            }
        }
    }
}