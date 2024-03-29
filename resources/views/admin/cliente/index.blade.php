<!-- invocando plantilla -->
@extends('template.index')
@section('nav-titulo', 'Gestion de cleintes')
@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nit</th>
                        <th>Tipo Cliente</th>
                        <th>Nombre</th> <!-- Nova coluna -->
                        <th>Apellido</th> <!-- Nova coluna -->
                        <th>Dirección</th> <!-- Nova coluna -->
                        <!-- ... -->
            
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $item)
                        <tr> 
                            <td>{{$item->nit}}</td>
                            <td>{{$item->tipocliente}}</td>
                            <td>{{$item->nombre}}</td> <!-- Novo campo -->
                            <td>{{$item->apellido}}</td> <!-- Novo campo -->
                            <td>{{$item->direccion}}</td> <!-- Novo campo -->
                            <!-- ... -->
                            <td>
                                <a href="{{route('cliente.edit', $item->id)}}"
                                    class="btn btn-small btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('cliente.destroy', $item->id)}}"
                                    onclick="return confirm('Esta seguro de eliminar el dato?')"
                                    class="btn btn-danger btn-small">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="font-size: 12px; height: 16px; padding: 0; line-height: 16px; text-align: center;">
        <div class="col-md-12" >
            {{$clientes->render()}}
        </div>
    </div>

@endsection