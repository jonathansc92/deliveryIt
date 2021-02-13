<?php 

namespace App\Services;

use App\Repositories\CorredoresProvasRepository;
use App\Validators\CorredoresProvasValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Http\Request;

class CorredoresProvasService {

    private $respository;
    private $validator;

    public function __construct(CorredoresProvasRepository $respository, CorredoresProvasValidator $validator){
        $this->respository = $respository;
        $this->validator = $validator;
    }


    public function getAll(){

        $corredoresProvas = $this->respository->all();

        return $corredoresProvas;

    }

    public function get($id){

        $corredorProva = $this->respository->find($id);

        return $corredorProva;

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