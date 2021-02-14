<?php 

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

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