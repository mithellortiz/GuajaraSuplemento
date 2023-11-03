@extends('template.index')
@section('titulo','Registrar Usuario')
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form action="{{route('usuario.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-3">
                <!-- Dentro do seu formulário, provavelmente dentro de uma tag <form>... -->
                <label for="nombre_persona">Nombre Persona</label>
                <input type="text" name="nombre_persona" value="{{ old('nombre_persona') }}" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="apellido_persona">Apellido de Persona</label>
                <input type="text" name="apellido_persona" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
            <label for="password">Contraseña</label>
               <input type="text" name="password" id="" class="form-control" required>
            </div>
        </div>
        <!-- Comando para por o botao pra direita ->(style="display: flex; justify-content: flex-end;") -->
        <div class="row" style="display: flex; justify-content: flex-end;"  >
            <div class="col-md-3">
                <button type="submit" class="btn btn-success btn-block mt-3 pull-right">
                    <i class="fa fa-plus" ></i>
                    Registrar
                </button>
            </div>
        </div>
   </form>
@endsection