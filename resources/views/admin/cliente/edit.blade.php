<!-- invocando plantilla -->
@extends('template.index')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('cliente.update', $cliente->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="nit" id="nit" 
                        class="form-control" placeholder="Nit"
                        value="{{$cliente->nit}}" required>
                    </div>
                    <div class="col-md-3">
                         <input type="text" name="tipocliente" id="tipocliente" 
                          class="form-control" placeholder="Tipocliente"
                          value="{{$cliente->tipocliente}}" required>
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