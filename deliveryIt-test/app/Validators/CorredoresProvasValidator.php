<?php 

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

class CorredoresProvasValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'corredores_id' => 'required',
            'provas_id'  => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'corredores_id' => 'required',
            'provas_id'  => 'required'
        ]
    ];

}