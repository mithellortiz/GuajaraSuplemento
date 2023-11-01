<!-- @extends('layouts.app') -->
@extends('template.index')
@section('contenido')
    <h1>Criar Tipo de Usuario</h1>
    <form action="{{ route('tipousuario.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nombre_tipo" id="" class="form-control" required autofocus>
            </div>
            <!-- <label>Nome: <input type="text" name="nombre_tipo"></label> -->
        </div>
        <!-- Comando para por o botao pra direita ->(style="display: flex; justify-content: flex-end;") -->
        <div class="row" style="display: flex; justify-content: flex-end;"  >
            <div class="col-md-3">
                <button type="submit" name="nombre_tipo" class="btn btn-success btn-block mt-3 pull-right">
                    <i class="fa fa-plus" ></i>
                    Registrar
                </button>
            </div>
        </div>
    </form>
@endsection