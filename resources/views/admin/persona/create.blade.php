@extends('template.index')
@section('titulo','Registrar Pesona')
@section('contenido')
   <form action="{{route('persona.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-3">
                <label for="nombre">Nombre de Persona</label>
                <input type="text" name="nombre" id="" class="form-control" required autofocus>
            </div>
            <div class="col-md-3">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="celular">Nº Celular</label>
                <input type="text" name="celular" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="direccion">Direccion</label>
               <input type="text" name="direccion" id="" class="form-control" required>
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