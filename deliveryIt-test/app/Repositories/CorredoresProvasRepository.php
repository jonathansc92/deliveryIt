<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CorredoresProvasRepository extends BaseRepository {

    function model()
    {
        return "App\\CorredoresProvas";
    }

}