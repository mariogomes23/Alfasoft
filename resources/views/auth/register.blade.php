@extends('master')

@section('conteudo')

    <div class="my-5" style="max-width: 400px;margin: 100px auto">
        <h2>Registro</h2>
        <form method="POST" action="{{ route('register') }}">
                        @csrf
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" value="{{old("name")}}" id="name" name="name" placeholder="Digite seu nome">
          </div>
          @error("name")
               <div class="alert alert-danger my-3" role="alert">
          {{$message}}
        </div>
          @enderror
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="{{old("email")}}" id="email" name="email" placeholder="Digite seu email">
          </div>
              @error("email")
               <div class="alert alert-danger my-3" role="alert">
          {{$message}}
        </div>
        @enderror
        
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
          </div>
          
              @error("password")
               <div class="alert alert-danger my-3" role="alert">
          {{$message}}
        </div>
        @enderror
        
        
        
          <div class="form-group">
            <label for="password">Confirmar Senha</label>
            <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="confirmar senha">
          </div>
          
              @error("password_confirmation")
               <div class="alert alert-danger my-3" role="alert">
          {{$message}}
        </div>
        @enderror
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
   
      </div>

@endsection
