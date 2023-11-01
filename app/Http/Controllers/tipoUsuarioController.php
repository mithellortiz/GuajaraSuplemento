<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;  // Certifique-se de que o model TipoUsuario exista

class TipoUsuarioController extends Controller
{
    public function index()
    {
       // $tipos = TipoUsuario::where('estado', 1)->orderBy('id', 'desc')->paginate(2);
        //return view('admin/tipousuario/index')->with('tipos', $tipos);
        $tipos = TipoUsuario::all();
        return view('admin/tipousuario/index', ['tipos' => $tipos]);
    }

    public function create()
    {
        return view('admin/tipousuario/create');
    }
    public function store(Request $request)
    {  
    try {
        $validatedData = $request->validate([
            'nombre_tipo' => 'required',
            // ... outras regras de validação ...
        ]);
        
        $tipo = new TipoUsuario($validatedData);
        $tipo->save();
        
        return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário criado com sucesso!');
    } catch (\Exception $e) {
        // Aqui capturamos qualquer exceção que possa ocorrer ao tentar salvar
        return redirect()->back()->with('error', 'Houve um erro ao tentar salvar: ' . $e->getMessage());
    }
    }

    public function show($id)
    {
        return view('admin/tipousuario/show', ['tipo' => $tipoUsuario]);
    }

    public function edit(TipoUsuario $tipoUsuario)
    {
        //$tipo = TipoUsuario::findOrFail($id);
        //return view('tipousuario.edit', compact('tipo'));
        return view('admin/tipousuario/edit', ['tipo' => $tipoUsuario]);
    }
    public function update(Request $request, TipoUsuario $tipoUsuario)
    {
        $tipoUsuario->update($request->all());
        return redirect()->route('tipousuario.index');
    }

    public function destroy($id)
    {  
    // Busca o tipo de usuário pelo ID e exclui
    $tipo = TipoUsuario::findOrFail($id);
    $tipo->delete();

    // Redireciona para a lista de tipos de usuários com uma mensagem de sucesso
    return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário excluído com sucesso!');
    }

}
