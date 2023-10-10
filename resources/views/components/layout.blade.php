<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>

            @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <a
                    href="#"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                >Sair</a>
            </form>
            @endauth

            @if (!isset($login))
                @guest
                <a href="{{ route('login') }}">Entrar</a>    
                @endguest
            @endif
        </div>
    </nav>
    <div class="container">
        <h1>{{ $title }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </div>
</body>
</html>