@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Tipo de Usuário</h1>
    
    <div class="card">
        <div class="card-header">
            Tipo de Usuário ID: {{ $tipoUsuario->getId() }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $tipoUsuario->getDescricao() }}</h5>
            <p class="card-text">Descrição do tipo de usuário: {{ $tipoUsuario->getDescricao() }}</p>
        </div>
    </div>

    <a href="{{ route('tipousuario.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
