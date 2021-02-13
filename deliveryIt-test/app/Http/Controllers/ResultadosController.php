<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResultadosService;

class ResultadosController extends Controller
{

    protected $corredoresService;

    public function __construct(ResultadosService $service){
        $this->service = $service;
    }

    public function index(){
        // dd($this->service->getAll());
        return view('resultados.index')->with(['resultados' => $this->service->getAll() ]);
    }

    public function create(){
        return view('resultados.addOrEdit');
    }

    public function edit($id){
        $resultado = $this->service->get($id);
        dd($resultado);
        return view('resultados.addOrEdit', compact('resultado'));
    }

    public function show($id){}

    public function store(Request $request){
        $this->service->store($request);
        return $this->index();
    }

    public function update($id, Request $request){
        $this->service->update($request, $id);
        return $this->index();
    }

    public function delete(){

    }
}
