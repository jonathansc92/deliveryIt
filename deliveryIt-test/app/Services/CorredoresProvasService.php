<?php 

namespace App\Services;

use App\Provas;
use App\Repositories\CorredoresProvasRepository;
use App\Validators\CorredoresProvasValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use App\Services\CorredoresService;
use App\Services\ProvasService;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class CorredoresProvasService {

    private $respository;
    private $validator;
    private $corredorService;
    private $provaService;

    public function __construct(CorredoresProvasRepository $respository, CorredoresProvasValidator $validator, CorredoresService $corredoresService, ProvasService $provaService){
        $this->respository = $respository;
        $this->validator = $validator;
        $this->corredorService = $corredorService;
        $this->provaService = $provaService;
    }


    public function getAll(){

        $corredoresProvas = $this->respository->all();

        return $corredoresProvas;

    }

    public function get($id){

        $corredorProva = $this->respository->with(['corredores','provas'])->find($id);

        return $corredorProva;

    }

    private function regras($request) {
        $corredor = $this->corredorService->get($request->corredores_id);

        $dataNascimento = \Carbon\Carbon::parse($corredor->data_nascimento);
        $anos = \Carbon\Carbon::now()->diffInYears($dataNascimento);

        
        if ($anos < 18) {
            return false;
        }

        $provasCorredor = $this->get($request->corredores_id);

        $provaAtual = $this->provaService->get($request->provas_id);

        if ($provasCorredor->count() > 1) {
            foreach($provasCorredor as $prova) {

                if ($provaAtual->data === $prova->data) {
                    return false;
                }
            }
        }

        return true;

    }

    public function store(Request $request) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

           $regras = $this->regras($request);
        //    $request['created_at']
        if ($regras === true) {
            $this->respository->create($request->all());
        }
        
        } catch (ValidatorException $e) {
            return Response::json([
                'error'   =>true,
                'message' =>$e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
           $this->respository->update($request->all(), $id);
        } catch (ValidatorException $e) {
            return Response::json([
                'error'   =>true,
                'message' =>$e->getMessage()
            ]);
        }
    }
}