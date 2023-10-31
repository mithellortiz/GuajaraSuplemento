@extends('template.index')
@section('titulo','Registrar Usuario')
@section('contenido')
   <form action="{{route('usuario.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nombre" id="" class="form-control" required autofocus>
            </div>
            <div class="col-md-3">
                <input type="text" name="apellido" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="email" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
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