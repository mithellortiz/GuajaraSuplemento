<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class clienteController extends Controller
{
    //para index
    public function index(){
        $clientes = Cliente::where('estado', 1)->orderBy('id', 'desc')->paginate(2);
        //dd($cliente);
        return view('admin/cliente/index')->with('clientes', $clientes);
    }
    //create
     public function create(){
        return view('admin/cliente/create');
     }
    //store
    public function store(Request $request){
        $cliente = new Cliente($request->all());
        $cliente->save();
        return redirect()->route('cliente.index');
    }
    //edit
    public function edit($id){
        $cliente = Cliente::find($id);
        return view('admin/cliente/edit')->with('cliente', $cliente);
    }
    //update
    public function update(Request $request, $id){
        $cliente = Cliente::find($id);
        $cliente->nit = $request->nit;
        $cliente->tipocliente = $request->tipocliente;
    
    
        $cliente->save();
        return redirect()->route('cliente.index');
    }
    //destroy
    public function destroy($id){
        $cliente = Cliente::find($id);
        //dd($cliente);
        $cliente->estado = 0;
        $cliente->save();
        return redirect()->route('cliente.index');
    }
}