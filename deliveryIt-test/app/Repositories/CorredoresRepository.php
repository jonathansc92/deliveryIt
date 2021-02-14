<?php
namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CorredoresRepository extends BaseRepository 
{
    public function model()
    {
        return "App\\Corredores";
    }
}
