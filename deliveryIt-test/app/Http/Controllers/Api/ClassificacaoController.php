<?php

namespace App\Http\Controllers\Api;

use App\Services\ClassificacaoService;
use App\Http\Controllers\Controller;

class ClassificacaoController extends Controller
{

    public function __construct(ClassificacaoService $service){
        $this->service = $service;
    }

    public function index($id){
        $data = ['data' => $this->service->getClassificacaoApi($id, null)];
        return response()->json($data);
    }

    public function show($id, $idade){
        $data = ['data' => $this->service->getClassificacaoApi($id, $idade)];
        return response()->json($data);
    }

}
