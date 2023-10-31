<!-- invocando plantilla -->
@extends('template.index')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $item)
                        <tr> 
                            <!-- <td>{{$item->nombre.' '.$item->apellido}}</td> -->
                            <!-- mostrará el nombre y apellido que provienen de la clase Persona -->
                            <td>{{$item->getNombreFromPersona().' '.$item->getApellidoFromPersona()}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->password}}</td>
                            <td>
                                <a href="{{route('usuario.edit', $item->id)}}"
                                    class="btn btn-small btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('usuario.destroy', $item->id)}}"
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
            {{$usuarios->render()}}
        </div>