@extends('master')

@section('conteudo')

  <div class="container" style="  max-width: 400px;margin: 100px auto;">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        
      <div class="form-group">
        <label for="loginEmail">Email</label>
        <input type="email" class="form-control" name="email" value="{{old("email")}}" id="loginEmail" placeholder="Digite seu email">
      </div>
      
       @error("password")
      <div class="alert alert-danger " role="alert">
        {{ $message}}
      </div>
 @enderror
      <div class="form-group">
        <label for="loginPassword">Senha</label>
        <input type="password" class="form-control" name="password" value="{{old("email")}}" id="loginPassword" placeholder="Digite sua senha">
      </div>
 @error("password")
      <div class="alert alert-danger " role="alert">
        {{ $message}}
      </div>
 @enderror
      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
  </div>
@endsection
