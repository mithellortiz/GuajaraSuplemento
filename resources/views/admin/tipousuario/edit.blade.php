<!-- @extends('layouts.app') -->
@extends('template.index')
@section('titulo','Editar Tipo de Usuario')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <!-- Início do formulário -->
    <!-- Aqui estamos definindo a ação do formulário para a rota 'tipousuario.update'. 
         A função 'route()' do Laravel gera uma URL para a rota nomeada fornecida como primeiro argumento.
         O segundo argumento é o ID do tipo de usuário, que é necessário para completar a URL dessa rota.
         Por exemplo, se $tipo->id for 5, a URL gerada seria algo como '/tipousuario/5'. --> 

         <!-- Aqui estamos imprimindo o ID para verificação -->
        <p>ID: {{ $tipo->id }}</p>
        <!-- Início do formulário -->
        <form action="{{ route('tipousuario.update', $tipo->id) }}" method="post">
                <!-- O método do formulário está definido como 'post', o que significa que este formulário enviará 
             os dados via método POST. POST é comumente usado para enviar dados do formulário que alterarão 
             ou adicionarão dados no servidor. -->
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                <input type="text" name="nombre_tipo" value="{{ $tipo->nombre_tipo }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="col-md-3">
                        <input type="submit" value="Editar" 
                        style="padding-left: 100px; padding-right: 100px; width: 700px;"
                        class="btn btn-success mt-4 pull-right btn-block">
                    
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
