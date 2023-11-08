<!-- invocando plantilla -->
@extends('template.index')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $item)
                        <tr> 
                            <td>{{$item->nombre.' '.$item->apellido}}</td>
                            <td>{{$item->celular}}</td>
                            <td>{{$item->direccion}}</td>
                            <td>
                                <a href="{{route('persona.edit', $item->id)}}"
                                    class="btn btn-small btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('persona.destroy', $item->id)}}"
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
    <!-- <div class="row" style="font-size: 12px; height: 16px; padding: 0; line-height: 16px; text-align: center;"> -->
        <!-- <div class="col-md-12" > -->
            <!-- {{$personas->render()}} -->
        <!-- </div> -->
    <!-- </div> -->

@endsection
@section('wrapper-auto-titulo', 'personas')