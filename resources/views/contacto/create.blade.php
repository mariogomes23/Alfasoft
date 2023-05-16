@extends("master")

@section("conteudo")

 
  <div class="container my-5">
    <h2>Adicionar Contacto</h2>
    <form action="{{route("contacto.store")}}" method="POST">
        @csrf
        @method("POST")
        
      <div class="form-group">
        <label for="name">Numero</label>
        <input type="number" value="{{old("number")}}" class="form-control" name="numero" placeholder="Digite seu o seu numero">
      </div>
    
      <div class="form-group">
      
        <label for="country">País</label>
   <select class="form-control" id="country" name="country">
        @foreach ($paises as $country)
            @if (isset($country['callingCodes'][0]))
                <option value="{{ $country['callingCodes'][0] }}">{{ $country['name']['common'] }} ({{ $country['callingCodes'][0] }})</option>
            @endif
        @endforeach
    </select>
    
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>


@endsection