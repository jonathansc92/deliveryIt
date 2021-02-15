<?php
namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ResultadosRepository extends BaseRepository 
{
    public function model()
    {
        return "App\\Resultados";
    }
}
