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
