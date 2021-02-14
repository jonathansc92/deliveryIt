<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Provas extends Model
{
    protected $table = 'provas';
    protected $fillable = ['tipo_prova', 'data', 'created_at', 'updated_at'];
}

