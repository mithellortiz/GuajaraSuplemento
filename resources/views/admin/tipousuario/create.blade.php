<!-- @extends('layouts.app') -->
@extends('template.index')
@section('titulo','Registrar Tipo Usuario')
@section('contenido')
    <!-- <h1>Criar Tipo de Usuario</h1> -->
    <form action="{{ route('tipousuario.store') }}" method="post">
        @csrf
        @method('POST')
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <label for="nombre_tipo">Nombre Tipo Usuario</label>
                <input type="text" name="nombre_tipo" id="" class="form-control" required autofocus>
            </div>
            <!-- <label>Nome: <input type="text" name="nombre_tipo"></label> -->
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