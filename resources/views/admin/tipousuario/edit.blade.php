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
        <p>ID: {{ $tipoUsuario->id }}</p>
        <!-- Início do formulário -->
        <form action="{{ route('tipousuario.update', $tipoUsuario->id) }}" method="POST">
                <!-- O método do formulário está definido como 'post', o que significa que este formulário enviará 
             os dados via método POST. POST é comumente usado para enviar dados do formulário que alterarão 
             ou adicionarão dados no servidor. -->
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                <!-- Cria um campo de entrada do tipo texto -->
                <!-- type="text": Define o tipo do campo de entrada como texto. -->
                <!-- name="nombre_tipo": Define um nome para o campo, que será usado quando os dados forem enviados para o servidor. -->
                <!--value="{{ $tipoUsuario->nombre_tipo }}":  Define o valor padrão para o campo de entrada. Neste caso, ele está pegando o valor da propriedade 'nombre_tipo' do objeto '$tipoUsuario'. -->
                    <label for="nombre_tipo">Nombre Tipo Usuario </label>
                    <input type="text" name="nombre_tipo" id="" value="{{ $tipoUsuario->nombre_tipo }}" required>
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
