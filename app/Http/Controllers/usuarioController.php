<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Persona; //importando la clase Persona
use Illuminate\Support\Facades\Hash;
class usuarioController extends Controller
{
    //para index
    public function index(){
        $usuarios = Usuario::where('estado', 1)->orderBy('id', 'desc')->paginate(2);
        //dd($usuario);
        return view('admin/usuario/index')->with('usuarios', $usuarios);
    }
    //create
     public function create(){
        return view('admin/usuario/create');
     }
    //store
    public function store(Request $request){

        $validatedData = $request->validate([
            'nombre_persona' => 'required|string',
            'apellido_persona' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            // ... adicione validações para os outros campos se necessário
        ]);
        //Primeiro, crea una nueva Persona
        $persona = new Persona();
        $persona->nombre = $request->nombre_persona;
        $persona->apellido = $request->apellido_persona;
    
        // Se você está recebendo 'celular' e 'direccion' do formulário, adicione-os aqui
        // Un valor por defecto si es null
        $persona->celular = $request->celular_persona ? $request->celular_persona : ''; 
        // Un valor por defecto si es null
        $persona->direccion = $request->direccion_persona ? $request->direccion_persona : '';  

        // ... (outros campos, se houver)
        $persona->save();
        if(!$persona->wasRecentlyCreated){
            return redirect()->back()->with('error', 'Hubo un problema al guardar la persona.');
        }
        
        // Em seguida, cria um novo Usuario que referencia essa Persona
        $usuario = new Usuario();
        $usuario->persona_id = $persona->id;
        $usuario->nombre = $request->nombre_persona;  // Supondo que você queira salvar o mesmo nome e sobrenome no Usuario
        $usuario->apellido = $request->apellido_persona;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password); // Não se esqueça de fazer hash da senha antes de salvar
        // ... (outros campos, se houver)
        $usuario->save();
        if(!$usuario->wasRecentlyCreated){
            return redirect()->back()->with('error', 'Hubo un problema al guardar el usuario.');
        }
        
        return redirect()->route('usuario.index');
    }
    //edit
    public function edit($id){
        $usuario = Usuario::find($id);
        return view('admin/usuario/edit')->with('usuario', $usuario);
    }
    //update
    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        $persona = $usuario->persona;
    
        $persona->nombre = $request->nombre_persona;
        $persona->apellido = $request->apellido_persona;
        $persona->save();
        // Ejemplo, puedes agregar o quitar campos según tu necesidad
        $usuario->email = $request->email; 
        // Ejemplo
        $usuario->password = $request->password;  
        $usuario->save();
    
        return redirect()->route('usuario.index');
    }
    //destroy
    public function destroy($id){
        $usuario = Usuario::find($id);
        //dd($usuario);
        $usuario->estado = 0;
        $usuario->save();
        return redirect()->route('usuario.index');
    }
}
