<!-- invocando plantilla -->
@extends('template.index')
@section('titulo','Lista de Usuario')
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->getNombreFromPersona()}}</td>
                            <td>{{$usuario->getApellidoFromPersona()}}</td>
                            <td>{{$usuario->email}}</td>
                            <!-- <td>{{ $usuario->password }}</td> -->
                            <td>********</td>
                            <!-- <td>{{ str_repeat('*', strlen($usuario->password)) }}</td> -->
                            <td>
                                <a href="{{route('usuario.edit', $usuario->id)}}"
                                    class="btn btn-small btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('usuario.destroy', $usuario->id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('Esta seguro de eliminar el dato?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No hay usuarios registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="font-size: 12px; height: 16px; padding: 0; line-height: 16px; text-align: center;">
        <div class="col-md-12">
            {{$usuarios->links()}}
        </div>
    </div>
@endsection
