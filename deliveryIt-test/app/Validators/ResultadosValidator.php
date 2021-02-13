<?php 

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

class ResultadosValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'provas_id' => 'required',
            'corredores_id'=> 'required',
            'hora_inicio'=> 'required',
            'hora_conclusao'=> 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'provas_id' => 'required',
            'corredores_id'=> 'required',
            'hora_inicio'=> 'required',
            'hora_conclusao'=> 'required'
        ]
    ];

}