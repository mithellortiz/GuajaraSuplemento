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

    // store
    public function store(Request $request){
        $producto = new Producto($request->all());
        $producto->save();
        return redirect()->route('producto.index');
    }

    // edit
    public function edit($id){
        $producto = Producto::find($id);
        return view('admin/producto/edit')->with('producto', $producto);
    }

    // update
    public function update(Request $request, $id){
        $producto = Producto::find($id);
        $producto->codigo = $request->codigo;
        $producto->categoria_id = $request->categoria_id;
        $producto->nombre = $request->nombre;
        $producto->descripción = $request->descripción; // Cuidado com caracteres especiais no nome do atributo
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->save();
        return redirect()->route('producto.index');
    }

    // destroy
    public function destroy($id){
        $producto = Producto::find($id);
        $producto->estado = 0;
        $producto->save();
        return redirect()->route('producto.index');
    }
}
