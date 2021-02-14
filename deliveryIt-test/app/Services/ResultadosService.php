<?php 

namespace App\Services;

use App\Repositories\ResultadosRepository;
use App\Validators\ResultadosValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use Exception;
use Illuminate\Database\QueryException;

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

        $resultado = $this->respository->with(['corredores', 'provas'])->find($id);

        return $resultado;

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
  
    public function getResultadosByProvas($idProva, $categoria = null) {

        $resultados = \App\Resultados::select(
            'resultados.hora_inicio as SUM(hr)',
            'resultados.hora_conclusao',
            'corredores.data_nascimento',
            'provas.tipo_prova',
            'corredores.nome',
            'resultados.corredores_id',
            'resultados.provas_id',
            \DB::raw('TIMEDIFF(resultados.hora_inicio, resultados.hora_conclusao) as dif'),
            \DB::raw('TIMESTAMPDIFF(YEAR, DATE(corredores.data_nascimento), NOW()) AS idade')
        )
        ->join('corredores', 'resultados.corredores_id', '=', 'corredores.id')
        ->join('provas', 'resultados.provas_id', '=', 'provas.id')
        ->where('resultados.provas_id', $idProva);

        if($categoria) {
            $idade = explode('-', $categoria, 2);

            if (count($idade) > 1) {
                $resultados->whereRaw("TIMESTAMPDIFF(YEAR, DATE(corredores.data_nascimento), NOW()) >" . $idade[0])
                    ->whereRaw("TIMESTAMPDIFF(YEAR, DATE(corredores.data_nascimento), NOW()) <" . $idade[1]);
            } else{
                $resultados->whereRaw("TIMESTAMPDIFF(YEAR, DATE(corredores.data_nascimento), NOW()) >" . $categoria);
            }

        }

        return $resultados->orderBy('dif', 'DESC')->get();
    }

}