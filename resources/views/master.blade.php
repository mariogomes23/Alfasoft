<!DOCTYPE html>
<html>
<head>
  <title>CRUD de Usuários</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
.navbar {
  background-color: #007bff;
  color: #fff;
}

.navbar-brand {
  color: #fff;
}

.rounded-circle {
  border: 2px solid #fff;
}
</style>
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
         @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route("register")}}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route("login")}}">Login</a>
          </li>
     
        @endguest
       
       
       @auth
          
       <form action="{{route("logout")}}" method="POST">
           @csrf
           @method("POST")
            <button class="btn btn-info">Sair</button>
          
       </form>
             @endauth
        
      </ul>
    </div>
  
  </nav>

  @yield("conteudo")



 

</body>
</html>
