<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CorredoresRepository extends BaseRepository {

    function model()
    {
        return "App\\Corredores";
    }

}