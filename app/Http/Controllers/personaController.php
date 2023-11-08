<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
class personaController extends Controller
{
    //para index
    public function index(Request $request){
        // se resqueste tem um valo chamado buscador, execute o que vamos enviar, se nao, executa a busca predeterminada.
        if($request->buscador){
            //creando una variable llamada parametro, na qual estamos fazendo uma concadenaçao para um like, em qual vai buscar
            $parametro = '%'.$request->buscador.'%';
            $personas = Persona::where('nombre', 'like', $parametro)->where('estado', 1)->orderBy('id', 'desc')->paginate(10);
        }
        else{
            $personas = Persona::where('estado', 1)->orderBy('id', 'desc')->paginate(2);
        }
        // Retornar a view com as pessoas encontradas
        return view('admin/persona/index')->with('personas', $personas);
    }
    //create
     public function create(){
        return view('admin/persona/create');
     }
    //store
    public function store(Request $request){
        $persona = new Persona($request->all());
        $persona->save();
        return redirect()->route('persona.index');
    }
    //edit
    public function edit($id){
        $persona = Persona::find($id);
        return view('admin/persona/edit')->with('persona', $persona);
    }
    //update
    public function update(Request $request, $id){
        $persona = Persona::find($id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->direccion = $request->direccion;
        $persona->save();
        return redirect()->route('persona.index');
    }
    //destroy
    public function destroy($id){
        $persona = Persona::find($id);
        //dd($persona);
        $persona->estado = 0;
        $persona->save();
        return redirect()->route('persona.index');
    }
}
