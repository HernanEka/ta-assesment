<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Bootsrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">


    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg border-bottom sticky-top bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Telkom Server</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
                        <li class="nav-item">
                            @if (request()->is('/'))
                                <a href="/" class="btn btn-danger">Dashboard</a>
                            @else
                                <a class="nav-link" aria-current="page" href="/">Dashboard</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (request()->is('*server*'))
                                <a href="/server" class="btn btn-danger">Server</a>
                            @else
                                <a class="nav-link" href="/server">Server</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (request()->is('*ip*'))
                                <a href="/ip" class="btn btn-danger">IP Address</a>
                            @else
                                <a class="nav-link" href="/ip">IP Address</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (request()->is('*users*'))
                                <a href="/users" class="btn btn-danger">User</a>
                            @else
                                <a class="nav-link" href="/users">User</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (request()->is('*riwayat*'))
                                <a href="/riwayat" class="btn btn-danger">Riwayat</a>
                            @else
                                <a class="nav-link" href="/riwayat">Riwayat</a>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">


            <div class="my-5">
                @if (request()->is('server/*'))
                    <a href="/server" class="btn btn-outline-dark">
                        <i class="bi bi-box-arrow-left"></i> Back
                    </a>
                @elseif (request()->is('ip/*'))
                    <a href="/server" class="btn btn-outline-dark">
                        <i class="bi bi-box-arrow-left"></i> Back
                    </a>
                @elseif (request()->is('users/*'))
                    <a href="/users" class="btn btn-outline-dark">
                        <i class="bi bi-box-arrow-left"></i> Back
                    </a>
                @endif
                <div class="display-1 fw-bold text-center" style="color: #ed1e28">
                    {{ $title }}
                </div>

                @if (request()->is('server/detail/*'))
                    <div class="text-end">
                        <a href="/server/edit/{{ $server->slug }}" class="btn btn-warning">Edit</a>
                    </div>
                @endif
            </div>
            <hr>
            @yield('content')

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
