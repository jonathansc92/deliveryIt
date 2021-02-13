<?php 

namespace App\Services;

use App\Repositories\CorredoresRepository;
use App\Validators\CorredoresValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use Exception;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class CorredoresService {

    private $respository;
    private $validator;

    public function __construct(CorredoresRepository $respository, CorredoresValidator $validator){
        $this->respository = $respository;
        $this->validator = $validator;
    }


    public function getAll(){

        $corredores = $this->respository->all();

        return $corredores;

    }

    public function get($id){

        $corredor = $this->respository->find($id);

        return $corredor;

    }

    public function store(Request $request) {
        
        try {
           $this->validator->with( $request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

           $request['created_at'] = \Carbon\Carbon::now();
           $request['updated_at'] = \Carbon\Carbon::now();

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
}