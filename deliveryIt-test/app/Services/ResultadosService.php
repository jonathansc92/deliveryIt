<?php 

namespace App\Services;

use App\Repositories\ResultadosRepository;
use App\Validators\ResultadosValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Http\Request;

class ResultadosService {

    private $respository;
    private $validator;

    public function __construct(ResultadosRepository $respository, ResultadosValidator $validator){
        $this->respository = $respository;
        $this->validator = $validator;
    }


    public function getAll(){

        $resultados = $this->respository->with(['corredores', 'provas'])->all();

        return $resultados;

    }

    public function get($id){

        $resultado = $this->respository->find($id);

        return $resultado;

    }

    public function store(Request $request) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
        //    $request['created_at']
           $this->respository->create($request->all());
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