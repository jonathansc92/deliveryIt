<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorredoresProvas extends Model
{
    protected $table = 'corredores_provas';

    protected $fillable = [
        'corredores_id', 
        'provas_id'
    ];

    public function corredores()
    {
        return $this->hasOne(Corredores::class, 'id');
    }

    public function provas()
    {
        return $this->hasOne(Provas::class, 'id');
    }

}
