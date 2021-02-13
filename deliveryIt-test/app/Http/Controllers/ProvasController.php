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
        $this->service->store($request);
        return $this->index();
    }

    public function update($id, Request $request){
        $this->service->update($request, $id);
        return $this->index();
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
