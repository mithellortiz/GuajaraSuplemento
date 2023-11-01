<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;  // Certifique-se de que o model TipoUsuario exista

class TipoUsuarioController extends Controller
{
    public function index()
    {
        $tipos = TipoUsuario::where('estado', 1)->orderBy('id', 'desc')->paginate(2);
        return view('admin/tipousuario/index')->with('tipos', $tipos);

        // $tipos = TipoUsuario::all();
        // return view('tipousuario.index', compact('tipos'));
    }

    public function create()
    {
        return view('admin/tipousuario/create');
    }
    public function store(Request $request)
    {  
    // Validação de dados
    $request->validate([
        'descricao' => 'required|string|max:255|unique:tipousuarios',
    ]);

    // Cria e salva o novo tipo de usuário
    $tipo = new TipoUsuario();
    $tipo->descricao = $request->descricao;
    $tipo->save();

    // Redireciona para a lista de tipos de usuários com uma mensagem de sucesso
    return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário criado com sucesso!');
    }


    public function show($id)
    {
        $tipo = TipoUsuario::findOrFail($id);
        return view('tipousuario.show', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = TipoUsuario::findOrFail($id);
        return view('tipousuario.edit', compact('tipo'));
    }
    public function update(Request $request, $id)
        {
    // Validação de dados
    $request->validate([
        'descricao' => 'required|string|max:255|unique:tipousuarios,descricao,' . $id,
    ]);

    // Busca o tipo de usuário pelo ID e atualiza os dados
    $tipo = TipoUsuario::findOrFail($id);
    $tipo->descricao = $request->descricao;
    $tipo->save();

    // Redireciona para a lista de tipos de usuários com uma mensagem de sucesso
    return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário atualizado com sucesso!');
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
