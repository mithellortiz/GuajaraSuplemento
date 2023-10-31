@extends('layouts.app')

@section('content')
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
            @foreach($tiposUsuarios as $tipo)
            <tr>
                <td>{{ $tipo->getId() }}</td>
                <td>{{ $tipo->getDescricao() }}</td>
                <td>
                    <a href="{{ route('tipousuario.edit', $tipo->getId()) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('tipousuario.destroy', $tipo->getId()) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
