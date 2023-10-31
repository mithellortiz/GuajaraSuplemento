@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tipo de Usuário</h1>

    <form action="{{ route('tipousuario.update', $tipoUsuario->getId()) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $tipoUsuario->getDescricao() }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('tipousuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
