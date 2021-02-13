<?php 

namespace App\Services;

use App\Repositories\ProvasRepository;
use App\Validators\ProvasValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Http\Request;

class ProvasService {

    private $respository;
    private $validator;

    public function __construct(ProvasRepository $respository, ProvasValidator $validator){
        $this->respository = $respository;
        $this->validator = $validator;
    }


    public function getAll(){

        $provas = $this->respository->all();

        return $provas;

    }

    public function get($id){

        $prova = $this->respository->find($id);

        return $prova;

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