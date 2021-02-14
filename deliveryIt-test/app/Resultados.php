<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    protected $table = 'resultados';

    protected $fillable = [
        'corredores_id', 
        'provas_id', 
        'hora_inicio',
        'hora_conclusao'
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
