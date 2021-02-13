<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ResultadosRepository extends BaseRepository {

    function model()
    {
        return "App\\Resultados";
    }

}