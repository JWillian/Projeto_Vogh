<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogh_tech</title>
    <link rel="stylesheet" href="{{url('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/estilo.css')}}">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <a class="navbar-brand m-auto mx-3" href="/">
               Vogh
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nós</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Meus Eventos</a>
                    </li>
                    <li class="nav-item" style="margin-left:900px">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault();
                             this.closest('form').submit();">Sair</a>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item"  style="margin-left:900px">
                        <a class="nav-link" href="/register">Cadastrar</a>
                    </li>
                    <li class="nav-item"  style="margin-left:5px">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endguest

            </div>
        </nav>
    </div>
    @yield('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <a class="navbar-brand m-auto mx-3" href="/">
               <p>Desenvolvido por : Jonatas Willian    - Dev JR - 2021<br>
               <p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                   

            </div>
        </nav>
    </div>


    <script src="{{url('/assets/js/javascript.js')}}"></script>
</body>

</html>