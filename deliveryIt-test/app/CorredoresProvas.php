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
        return $this->belongsTo(Corredores::class, 'corredores_id', 'id');
    }

    public function provas()
    {
        return $this->belongsTo(Provas::class, 'provas_id', 'id');
    }

}
