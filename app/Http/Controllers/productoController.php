<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Certifique-se de que o namespace do modelo Producto esteja correto

class ProductoController extends Controller
{
    // para index
    public function index(){
        $productos = Producto::where('estado', 1)->orderBy('id', 'desc')->paginate(2);
        return view('admin/producto/index')->with('productos', $productos);
    }

    // create
    public function create(){
        return view('admin/producto/create');
    }

    //Função para armazenar um novo produto
    // Function to store a new product
    public function store(Request $request){
        $producto = new Producto($request->all());
        $producto->save();
        return redirect()->route('producto.index');
    }

    // Function to show the form for editing the specified product
    //Função para mostrar o formulário de edição do produto especificado
    public function edit($id){
        $producto = Producto::find($id);
        return view('admin/producto/edit')->with('producto', $producto);
    }


    // Function to update the specified product
    //Função para atualizar o produto especificado
    public function update(Request $request, $id){
        $producto = Producto::find($id);
        $producto->fill($request->all());
        $producto->save();
        return redirect()->route('producto.index');
        // $producto = Producto::find($id);
        // $producto->codigo = $request->codigo;
        // $producto->categoria_id = $request->categoria_id;
        // $producto->nombre = $request->nombre;
        // $producto->descripción = $request->descripción; // Cuidado com caracteres especiais no nome do atributo
        // $producto->precio = $request->precio;
        // $producto->estado = $request->estado;
        // $producto->save();
        // return redirect()->route('producto.index');
    }

    // Function to remove the specified product
    //Função para remover o produto especificado
    public function destroy($id){
        $producto = Producto::find($id);
        $producto->estado = 0; // Assuming '0' means 'inactive'
        $producto->save();
        return redirect()->route('producto.index');
    }
}
