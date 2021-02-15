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
        return view('resultados.index')->with(['resultados' => $this->service->getAll() ]);
    }

    public function create(){
        return view('resultados.addOrEdit');
    }

    public function edit($id){
        $resultado = $this->service->get($id);
        return view('resultados.addOrEdit', compact('resultado'));
    }

    public function show($id){}

    public function store(Request $request){
        $store = $this->service->store($request);
        
        if ($store['success'] === false) {
            \Toastr::warning($update['messages'], 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);

        return redirect('resultados');
    }

    public function update($id, Request $request){
        $update = $this->service->update($request, $id);

        if ($store['success'] === false) {
            \Toastr::warning($update['messages'], 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } 
        
        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function delete(){

    }
}
