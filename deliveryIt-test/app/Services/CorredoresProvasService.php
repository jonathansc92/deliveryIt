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
            return ['data' => ['messages' => 'O corredor é menor de idade', false]];
        }

        $provasCorredor = $this->respository->findWhere(['corredores_id' => $request->corredores_id]);

        $provaAtual = $this->provaService->get($request->provas_id);

        if ($provasCorredor->count() > 0) {
            foreach($provasCorredor as $prova) {

                if ($provaAtual->data === $prova->provas->data) {
                    return ['data' => ['messages' => 'O corredor já possui uma prova nesse mesmo dia', false]];
                }
            }
        }

        return ['data' => [true]];
      
    }

    public function store(Request $request) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

           $request['created_at'] = \Carbon\Carbon::now();
           $request['updated_at'] = \Carbon\Carbon::now();

           $regras = $this->regras($request);

            if (!$regras['data'][0]){
                return $regras;
            }

            $this->respository->create($request->all());
            return ['data' => ['messages' => 'Salvo com sucesso!', 201]];

        } catch (Exception $e) {

            switch(get_class($e))
            {
                case QueryException::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                case ValidatorException::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                case Exception::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                default : return ['data' => ['messages' => get_class($e), 1010]];
            }
        }
    }

    public function update(Request $request, $id) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
           
           $request['updated_at'] = \Carbon\Carbon::now();

           $regras = $this->regras($request);

            if (!$regras['data'][0]){
                return $regras;
            }

            $this->respository->update($request->all(), $id);

            return ['data' => ['messages' => 'Atualizado com sucesso!', 201]];

        } catch (Exception $e) {

            switch(get_class($e))
            {
                case QueryException::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                case ValidatorException::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                case Exception::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                default : return ['data' => ['messages' => get_class($e), 1010]];
            }
        }
    }

    public function delete($id) {
        
        try {

           $this->respository->delete($id);

           return ['data' => ['messages' => 'Removido com sucesso!', 200]];
        } catch (Exception $e) {

            switch(get_class($e))
            {
                case QueryException::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                case Exception::class : return ['data' => ['messages' => $e->getMessage(), 1010]];
                default : return ['data' => ['messages' => get_class($e), 1010]];
            }
        }
    }
}