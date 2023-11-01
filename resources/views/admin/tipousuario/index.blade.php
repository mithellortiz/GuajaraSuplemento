<!-- @extends('layouts.app') -->
@extends('template.index')
@section('contenido')
<div class="container">
    <h1>Tipos de Usuários</h1>
    <a href="{{ route('tipousuario.create') }}" class="btn btn-primary mb-2">Adicionar Novo Tipo</a>

    <table class="table table-bordered table-striped">
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
                <td><a href="{{ route('tipoUsuario.show', $tipo->id) }}">{{ $tipo->nombre_tipo }}</a></td>
                <td>
                    <!-- Aqui você pode adicionar botões para editar, deletar etc. -->
                    <a href="{{ route('tipoUsuario.edit', $tipo->id) }}" class="btn btn-warning">Editar</a>
                    <!-- Adicione outras ações conforme necessário -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
