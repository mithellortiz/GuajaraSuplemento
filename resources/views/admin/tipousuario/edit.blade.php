<!-- @extends('layouts.app') -->
@extends('template.index')
@section('contenido')
<div class="container">
    <h1>Editar Tipo de Usuario</h1>
    <form action="{{ route('tipousuario.update', $tipo) }}" method="post">
        @csrf
        @method('PUT')
        <label>Nome: <input type="text" name="nombre_tipo" value="{{ $tipo->nombre_tipo }}"></label>
        <button type="submit">Atualizar</button>
    </form>

</div>
@endsection
