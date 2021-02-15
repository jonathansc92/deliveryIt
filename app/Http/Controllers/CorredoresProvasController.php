<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CorredoresProvasService;

class CorredoresProvasController extends Controller
{

    protected $corredoresService;

    public function __construct(CorredoresProvasService $service){
        $this->service = $service;
    }

    public function index(){
        return view('corredoresProvas.index')->with(['corredoresProvas' => $this->service->getAll() ]);
    }

    public function create(){
        return view('corredoresProvas.addOrEdit');
    }

    public function edit($id){
        $corredorProva = $this->service->get($id);
        return view('corredoresProvas.addOrEdit', compact('corredorProva'));
    }

    public function show($id){}

    public function store(Request $request){
        $store = $this->service->store($request);

        if ($store['success'] === false) {
            \Toastr::warning($store['messages'], 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
       } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);

        return redirect('corredores-provas');
    }

    public function update($id, Request $request){
        $update = $this->service->update($request, $id);

        if ($update['success'] === false) {
            \Toastr::warning($update['messages'], 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function delete(){}
}