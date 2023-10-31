<!-- invocando plantilla -->
@extends('template.index')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('usuario.update', $usuario->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">

                        <input type="text" name="nombre" id="nombre" 
                        class="form-control" placeholder="Nombre"
                        value="{{$usuario->getNombreFromPersona()}}" required>
                    </div>
                    <div class="col-md-3">
                         <input type="text" name="apellido" id="apellido" 
                          class="form-control" placeholder="Apellido"
                          value="{{$usuario->getApellidoFromPersona()}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" id="email" 
                         class="form-control" placeholder="Email"
                         value="{{$usuario->email}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="password" id="password" 
                         class="form-control" placeholder="Password"
                         value="{{$usuario->password}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-3">
                            <input type="submit" value="Editar" 
                            style="padding-left: 100px; padding-right: 100px; width: 700px;" class="btn
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection