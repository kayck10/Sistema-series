 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Series</title>
 </head>

 <body>

     <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
             <a class="navbar-brand" href="{{ route('series.index') }}">Sistema Séries</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav">
                     @auth
                         <li class="nav-item">
                             <a class="nav-link active" href="{{ route('logout') }}">Sair</a>
                         </li>
                     @endauth
                     @guest
                         <li class="nav-item">
                             <a class="nav-link active" href="{{ route('login.index') }}">Entrar</a>
                         </li>
                     @endguest
                     <form class="d-flex" role="search">
                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success" type="submit">Search</button>
                     </form>
             </div>
         </div>
     </nav>

     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
     @yield('conteudo')

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>
