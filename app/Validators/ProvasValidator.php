<?php
namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class ProvasValidator extends LaravelValidator 
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'tipo_prova' => 'required',
            'data'=> 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'tipo_prova' => 'required',
            'data'=> 'required'
        ]
    ];
}
