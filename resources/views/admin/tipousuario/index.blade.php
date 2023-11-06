
@extends('template.index')
@section('contenido')
<!-- Mudar para class="row" -->
    <div class="row">
        <div class="col-md-12">
            <!-- <h1>Tipos de Usuários</h1> -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td><a href="{{ route('tipousuario.show', $tipo->id) }}">{{ $tipo->nombre_tipo }}</a></td>
                        <td>
                            <a href="{{ route('tipousuario.create') }}" 
                                class="btn btn-primary mb-2">
                             <i class="fa fa-plus-circle"></i>
                            </a>
                            <!-- Aqui você pode adicionar botões para editar, deletar etc. -->
                            <a href="{{ route('tipousuario.edit', $tipo->id) }}" 
                                class="btn btn-warning mb-2">
                                <i class="fa fa-edit"></i>
                            </a>
                            <!-- Adicione outras ações conforme necessário -->
                            <a href="{{route('tipousuario.destroy', $tipo->id)}}"
                                onclick="return confirm('Esta seguro de eliminar el dato?')"
                                class="btn btn-danger btn-small mb-2">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
