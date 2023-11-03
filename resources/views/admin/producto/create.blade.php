@extends('template.index')
@section('titulo','Registrar Producto')
@section('contenido')
   <form action="{{route('producto.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-3">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" id="" class="form-control" required autofocus>
            </div>
            <div class="col-md-3">
                <label for="categoria_id">Categoría</label>
                <!-- Assumindo que você tenha uma lista de categorias, você pode querer usar um dropdown aqui -->
                <input type="number" name="categoria_id" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="estado">Estado</label>
                <!-- Aqui, você pode querer usar um dropdown ou um radio button para estados. Exemplo: Activo/Inactivo -->
                <input type="number" name="estado" id="" class="form-control" required>
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
