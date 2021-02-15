<?php
namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ProvasRepository extends BaseRepository 
{
    public function model()
    {
        return "App\\Provas";
    }
}
