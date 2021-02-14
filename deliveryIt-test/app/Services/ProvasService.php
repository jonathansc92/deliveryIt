<?php 

namespace App\Services;

use App\Repositories\ProvasRepository;
use App\Validators\ProvasValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use Exception;
use Illuminate\Database\QueryException;

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

    public function dataAjax($search){
        return \App\Provas::select("id","tipo_prova", "data")
        ->where('tipo_prova','LIKE',"%$search%")
        ->get();
    }
}