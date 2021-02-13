<?php 

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

class CorredoresValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required',
            'cpf'  => 'required',
            'data_nascimento'=> 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required',
            'cpf'  => 'required',
            'data_nascimento'=> 'required'
        ]
    ];

}