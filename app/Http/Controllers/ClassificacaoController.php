<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClassificacaoService;

class ClassificacaoController extends Controller
{

    protected $corredoresService;

    public function __construct(ClassificacaoService $service){
        $this->service = $service;
    }

    public function index($id){
        return view('classificacao.geral')->with(['classificacao' => $this->service->getClassificacaoGeral($id, null) ]);
    }

    public function classificaoIdade($id, $idade){
        return view('classificacao.geral')->with(['classificacao' => $this->service->getClassificacaoGeral($id, $idade) ]);
    }

    public function show($id){}

}
