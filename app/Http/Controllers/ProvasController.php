<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProvasService;

class ProvasController extends Controller
{

    protected $service;

    public function __construct(ProvasService $service){
        $this->service = $service;
    }

    public function index(){
        return view('provas.index')->with(['provas' => $this->service->getAll() ]);
    }

    public function create(){
        return view('provas.addOrEdit');
    }

    public function edit($id){
        $prova = $this->service->get($id);
        return view('provas.addOrEdit', compact('prova'));
    }

    public function show($id){}

    public function store(Request $request){
        $store = $this->service->store($request);

        if ($store['success'] === false) {
            \Toastr::warning($store['messages'], 'Erro', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
       } 

        \Toastr::success('Salvo com sucesso', '', ["positionClass" => "toast-top-right"]);

        return redirect('provas');
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
