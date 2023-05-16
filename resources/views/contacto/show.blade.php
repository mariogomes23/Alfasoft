

@extends("master")


@section("conteudo")
 <div class="container">
    <h2>Detalhes</h2>

    <div class="row">
      <div class="col-md-6">
        <div class="list-group">
        
          <p  class="list-group-item list-group-item-action" >  ID {{ $pessoa->id }}</p>
          <p  class="list-group-item list-group-item-action">Nome {{ $pessoa->nome }}</p>
       
      </div>
      <div class="col-md-6">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">
            Contato
          </a>
          <p class="list-group-item list-group-item-action">ID: 456</p>
          <p class="list-group-item list-group-item-action">Número: +1 123456789</p>
        </div>
      </div>
    </div>

    <a href="#" class="btn btn-primary mt-3">Editar Usuário</a>
    <a href="#" class="btn btn-danger mt-3">Apagar Usuário</a>
    
    
  </div>
@endsection