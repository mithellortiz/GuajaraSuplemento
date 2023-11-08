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
    // Na função store, você precisa adicionar os novos campos ao criar um novo cliente
    public function store(Request $request){
        // Adicionando validação - é recomendável validar os dados de entrada
        $request->validate([
            'nit' => 'required|unique:clientes,nit',
            'tipocliente' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
        ]);

        // Criando o cliente com os dados recebidos do formulário
        $cliente = new Cliente($request->all()); // Isso já deve pegar todos os campos se eles estiverem no fillable do modelo
        
        // Salvando o cliente no banco de dados
        $cliente->save();

        // Redirecionando para a listagem de clientes
        return redirect()->route('cliente.index');
    }
    //edit
    public function edit($id){
        $cliente = Cliente::find($id);
        return view('admin/cliente/edit')->with('cliente', $cliente);
    }
    //update
    // Na função update, você precisa atualizar os novos campos quando um cliente é editado
    public function update(Request $request, $id){
        // Adicionando validação - é recomendável validar os dados de entrada
        $request->validate([
            'nit' => 'required|unique:clientes,nit,' . $id, // Exclua o próprio cliente da verificação de unicidade
            'tipocliente' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
        ]);

        // Buscando o cliente que será atualizado
        $cliente = Cliente::find($id);

        // Atualizando os campos do cliente
        $cliente->nit = $request->nit;
        $cliente->tipocliente = $request->tipocliente;
        $cliente->nombre = $request->nombre; // Novo campo adicionado
        $cliente->apellido = $request->apellido; // Novo campo adicionado
        $cliente->direccion = $request->direccion; // Novo campo adicionado
    
        // Salvando as alterações no banco de dados
        $cliente->save();

        // Redirecionando para a listagem de clientes
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