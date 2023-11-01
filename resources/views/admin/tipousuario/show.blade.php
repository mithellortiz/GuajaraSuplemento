<!-- @extends('layouts.app') -->
@extends('template.index')
@section('contenido')
    <h1>Detalhes do Tipo de Usuario: {{ $tipo->nombre_tipo }}</h1>
    <p>ID: {{ $tipo->id }}</p>
    <p>Nome: {{ $tipo->nombre_tipo }}</p>
    <a href="{{ route('tipoUsuario.edit', $tipo->id) }}">Editar</a>
@endsection
