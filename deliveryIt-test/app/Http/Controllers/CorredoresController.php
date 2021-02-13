<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CorredoresService;
class CorredoresController extends Controller
{

    protected $service;

    public function __construct(CorredoresService $service){
        $this->service = $service;
    }

    public function index(){
        return view('corredores.corredoresLista')->with(['corredores' => $this->service->getAll() ]);
    }

    public function create(){
        return view('corredores.addOrEdit');
    }

    public function edit($id){
        $corredor = $this->service->get($id);
        return view('corredores.addOrEdit', compact('corredor'));
    }

    public function show($id){}

    public function store(Request $request){
       $store = $this->service->store($request);
       
        if ($store['success'] === false) {
            \Toastr::warning('Esqueceu de preencher algum campo?', 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
       } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);
        return redirect('corredores');
    }

    public function update($id, Request $request){
       $update = $this->service->update($request, $id);

       if ($update['success'] === false) {
            \Toastr::warning('Esqueceu de preencher algum campo?', 'Erro', ["positionClass" => "toast-top-right"]);
       } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    public function delete(){

    }

    public function dataAjax(Request $request)
    {
    	$data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = $this->service->dataAjax($search);
        }

        return response()->json($data);
    }
}
