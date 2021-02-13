<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corredores extends Model
{
    protected $table = 'corredores';

    protected $fillable = ['nome', 'cpf', 'data_nascimento'];

}
