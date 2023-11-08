<!-- invocando plantilla -->
@extends('template.index')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr> 
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->categoria_id}}</td> <!-- Aqui você pode querer exibir o nome da categoria ao invés do ID -->
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripción}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>
                                <a href="{{route('producto.edit', $producto->id)}}"
                                    class="btn btn-small btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('producto.destroy', $producto->id)}}"
                                    onclick="return confirm('Esta seguro de eliminar el dato?')"
                                    class="btn btn-danger btn-small">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $productos->links() }} {{-- Paginação --}}
        </div>
    </div>
    <div class="row" style="font-size: 12px; height: 16px; padding: 0; line-height: 16px; text-align: center;">
        <div class="col-md-12" >
            {{$productos->render()}}
        </div>
    </div>

@endsection
