<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CorredoresService;
class CorredoresController extends Controller
{

    protected $corredoresService;

    public function __construct(CorredoresService $corredoresService){
        $this->corredoresService = $corredoresService;
    }

    public function index(){
        return view('corredores.corredoresLista')->with(['corredores' => $this->corredoresService->getAll() ]);
    }

    public function create(){
        return view('corredores.addOrEdit');
    }

    public function edit($id){
        $corredor = $this->corredoresService->get($id);
        return view('corredores.addOrEdit', compact('corredor'));
    }

    public function show($id){}

    public function store(Request $request){
       $store = $this->corredoresService->store($request);
       
        if ($store['success'] === false) {
            \Toastr::warning('Esqueceu de preencher algum campo?', 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
       } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);
        return redirect()->route('corredores');
    }

    public function update($id, Request $request){
       $update = $this->corredoresService->update($request, $id);

       if ($update['success'] === false) {
            \Toastr::warning('Esqueceu de preencher algum campo?', 'Erro', ["positionClass" => "toast-top-right"]);
       } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    public function delete(){

    }
}
