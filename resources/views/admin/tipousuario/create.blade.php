@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Tipo de Usuário</h1>

    <form action="{{ route('tipousuario.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('tipousuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
