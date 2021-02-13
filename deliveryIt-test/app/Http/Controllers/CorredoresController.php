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
        $this->corredoresService->store($request);
        return $this->index();
    }

    public function update($id, Request $request){
        $this->corredoresService->update($request, $id);
        return $this->index();
    }

    public function delete(){

    }
}
