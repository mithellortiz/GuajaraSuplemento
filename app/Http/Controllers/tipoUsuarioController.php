<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;  // Certifique-se de que o model TipoUsuario exista
use Illuminate\Support\Facades\Log;

class TipoUsuarioController extends Controller
{
    public function index()
    {
        // $tipos = TipoUsuario:: - "Inicia a construção da consulta ao modelo TipoUsuario (representa a tabela de tipos de usuários no banco de dados).
        // where('estado', 1)-> - "Filtra os registros da tabela para obter apenas aqueles onde o valor da coluna 'estado' é igual a 1.
        // orderBy('id', 'asc')-> - "Ordena os registros filtrados pela coluna 'id' em ordem crescente. Assim, o registro com o menor 'id' aparecerá primeiro.
        // paginate(5); - "Divide os resultados em páginas, retornando apenas 5 registros por página.
        $tipos = TipoUsuario::where('estado', 1)->orderBy('id', 'asc')->paginate(5);
        //return view('admin/tipousuario/index')->with('tipos', $tipos);
        //$tipos = TipoUsuario::all();
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
        $tipo = new TipoUsuario();
        $tipo->nombre_tipo = $request->input('nombre_tipo');
        $tipo->save();
        
        return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário criado com sucesso!');
    } catch (\Exception $e) {
        // Aqui capturamos qualquer exceção que possa ocorrer ao tentar salvar
        return redirect()->back()->with('error', 'Houve um erro ao tentar salvar: ' . $e->getMessage());
    }
    }
    public function show($id)
    {
        // Recupera o TipoUsuario pelo ID
        $tipoUsuario = TipoUsuario::find($id);

        // Verifica se o TipoUsuario existe
        if (!$tipoUsuario) {
            return redirect()->route('tipousuario.index')->with('error', 'Tipo de usuário não encontrado.');
        }

        // Retorna a view com o TipoUsuario
        return view('admin/tipousuario/show', ['tipo' => $tipoUsuario]);
    }

    public function edit($id)
    {
        // Use a variável com nome $tipoUsuario, como foi feito em outras partes do código
        $tipoUsuario = TipoUsuario::find($id);

        if (!$tipoUsuario) {
            // ID não encontrado. Talvez redirecionar para uma página de erro.
            return redirect()->route('tipousuario.index')->with('error', 'ID não encontrado');
        }
        // Aqui, retorne a variável $tipoUsuario para a view
        return view('admin/tipousuario/edit', compact('tipoUsuario'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Dados recebidos:', $request->all());
        $tipoUsuario = TipoUsuario::find($id);
        if (!$tipoUsuario) {
            return redirect()->route('tipousuario.index')->with('error', 'Tipo de usuário não encontrado.');
        }

        $tipoUsuario->update($request->all());

        Log::info('TipoUsuario após atualização:', $tipoUsuario->toArray());

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário atualizado com sucesso!');
    }


    public function destroy($id)
    {  
    // Busca o tipo de usuário pelo ID e exclui
    $tipo = TipoUsuario::find($id);
    $tipo->estado = 0;
    $tipo->delete(); // Isto irá apenas marcar como deletado (soft delete)
    $tipo->save();

    // Redireciona para a lista de tipos de usuários com uma mensagem de sucesso
    return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário excluído com sucesso!');
    }

}
