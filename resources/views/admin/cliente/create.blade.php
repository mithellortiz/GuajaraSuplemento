@extends('template.index')
@section('titulo','Registrar Cliente')
@section('contenido')
   <form action="{{route('cliente.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nit" id="" class="form-control" required autofocus>
            </div>
            <div class="col-md-3">
                <input type="text" name="tipocliente" id="" class="form-control" required>
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