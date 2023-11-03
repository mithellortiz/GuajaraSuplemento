@extends('template.index')
@section('titulo','Editar Produto')
@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('producto.update', $producto->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="codigo" id="codigo" 
                        class="form-control" placeholder="Código"
                        value="{{$producto->codigo}}" required>
                    </div>
                    <div class="col-md-3">
                         <input type="number" name="categoria_id" id="categoria_id" 
                          class="form-control" placeholder="Categoría ID"
                          value="{{$producto->categoria_id}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="nombre" id="nombre" 
                         class="form-control" placeholder="Nombre"
                         value="{{$producto->nombre}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="descripcion" id="descripcion" 
                         class="form-control" placeholder="Descripción"
                         value="{{$producto->descripcion}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="precio" id="precio" 
                         class="form-control" placeholder="Precio"
                         value="{{$producto->precio}}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="estado" id="estado" 
                         class="form-control" placeholder="Estado"
                         value="{{$producto->estado}}" required>
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
