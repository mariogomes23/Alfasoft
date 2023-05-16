@extends("master")

@section("conteudo")

  <div class="container">
    <h2> Editar  {{ $pessoa->nome}}</h2>
    <form  action="{{route("pessoa.update",$pessoa->id)}}" method="POST">
           @method("PUT")
            @csrf
            
     
        
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" value="{{$pessoa->nome}}" name="nome">
      </div>
   @error("nome")
   
      <div class="mt-2">
          <p class="alert alert-danger">{{$message}}</p>
          
      </div>
   @enderror
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="{{$pessoa->email}}" name="email" required>
      </div>
         @error("email")
   
      <div class="mt-2">
          <p class="alert alert-danger">{{$message}}</p>
          
      </div>
   @enderror
    
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>



@endsection