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
            $tipo = TipoUsuario::find($id);
            if (!$tipo) {
                // ID não encontrado. Talvez redirecionar para uma página de erro.
                return redirect()->route('tipousuario.index')->with('error', 'ID não encontrado');
            }
            return view('path_to_your_edit_view', compact('tipo'));
        }

    public function update(Request $request, $id)
    {
           // Validação básica
            $validatedData = $request->validate([
                'nome_tipo' => 'required|max:255',  // Exemplo de regra de validação
                // Outras regras de validação para outros campos, se necessário
            ]);

            $tipoUsuario->update($validatedData);

            // Redirecionamento com mensagem de sucesso
            return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {  
    // Busca o tipo de usuário pelo ID e exclui
    $tipo = TipoUsuario::find($id);
    $tipo->estado = 0;
    $tipo->save();

    // Redireciona para a lista de tipos de usuários com uma mensagem de sucesso
    return redirect()->route('tipousuario.index')->with('success', 'Tipo de usuário excluído com sucesso!');
    }

}
