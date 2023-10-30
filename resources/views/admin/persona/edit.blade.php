<!-- invocando plantilla -->
@extends('template.index')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('persona.update', $persona->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="nombre" id="nombre" 
                        class="form-control" placeholder="Nombre"
                        value="{{$persona->nombre}}" required>
                    </div>
                    <div class="col-md-3">
                         <input type="text" name="apellido" id="apellido" 
                          class="form-control" placeholder="Apellido"
                          value="{{$persona->apellido}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="celular" id="celular" 
                         class="form-control" placeholder="Celular"
                         value="{{$persona->celular}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="direccion" id="direccion" 
                         class="form-control" placeholder="Direccion"
                         value="{{$persona->direccion}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-3">
                            <input type="submit" value="Editar" 
                            style="padding-left: 100px; padding-right: 100px; width: 700px;" class="btn btn-success mt-4 pull-right btn-block">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection