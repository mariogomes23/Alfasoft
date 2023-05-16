@extends("master")


@section("conteudo")


  <div class="container">
    <h2>Lista de Pessoas</h2>
<h1  style="display:inline;" class="mr-10">
  <a href="{{route("pessoa.create")}}">
    <i class="bi bi-person-plus-fill"></i>
  </a>
  
<h1 style="display:inline;">
      <a href="{{route("contacto.index")}}">
          
      <i class="bi bi-telephone"></i>
  </a>
</h1>


@if(Session::has("message"))
<p class="alert alert-success">{{ Session::get("message")}}</p>

@endif
    <table class="table mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>

 @forelse($pessoa as $p)
 
        <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->nome}}</td>
        <td>{{$p->email}}</td>
            
            <td>
              <a href="{{route("pessoa.edit",$p->id)}}" class="btn btn-info">
                <i class="bi bi-pen"></i>
              </a>
              <a href="{{route("pessoa.show",$p->id)}}" class="btn btn-primary">
                <i class="bi bi-display"></i>
              </a>
              <form action="{{route("pessoa.destroy",$p->id)}}" method="POST" style="display:inline">
                  @csrf
                  @method("DELETE")
                  
                  <button type="submit" class="btn btn-danger"> 
                   <i class="bi bi-trash"></i>
                  </button>
              
              </form>
              <a href="#" class="btn btn-secondary">
                <i class="bi bi-telephone"></i>
              </a>

            </td>
        </tr>

@empty
<h1>Sem Pessoas Disponiveis</h1>

 @endforelse
      </tbody>
    </table>
  
  </div>





@endsection