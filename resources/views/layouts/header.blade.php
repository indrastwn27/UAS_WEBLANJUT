<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Ghazian')</title>
    <link rel="icon" href="/images/layout/ikon-logo.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    {{-- HEADER NAVBAR --}}
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="/images/layout/main-logo.png" width="320" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/donasi">Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/donatur">List Donatur</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> {{ ucwords(Auth::user()->username) }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if (Auth::user()->jenisAkun === 'admin')
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="/session/logout">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/session"><i class="fa-solid fa-right-to-bracket"></i>Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    {{-- END HEADER NAVBAR --}}

    {{-- MODAL NOTIFICATION --}}
    @if (session('error'))
        <div class="modal fade" id="errorModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="errorModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalCenterTitle"> {{ session('errorHeader') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer">
                        @if (Auth::check() && Auth::user()->jenisAkun === 'guest')
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        @else
                            <a href="/session" class="btn btn-primary">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- END MODAL NOTIFICATION --}}

    {{-- MAIN CONTENT --}}
    <main class="container py-4">
        @yield('content')
    </main>
    {{-- END MAIN CONTENT --}}

    {{-- FOOTER --}}
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <img src="/images/layout/main-logo.png" width="200" alt="Ghazian Logo">
                    <p class="mt-2 mb-0">Platform donasi online untuk kebaikan bersama.</p>
                </div>
                
                <div class="col-md-8 text-center text-md-right ">
                    <p class="mb-0">&copy; {{ date('Y') }} Website UAS Kelompok 5.</p>
                </div>
            </div>
        </div>
    </footer>
    {{-- END FOOTER --}}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                $('#errorModalCenter').modal('show');
            @endif
        });
    </script>
</body>

</html>

<style>
    /* Header Styles */
    .navbar {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    body {
        padding-top: 65px;
        font-family: "Poppins", sans-serif;
        color: #343434;
        background-color: #f2f2f2;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
    }

    .navbar-brand img {
        width: 170px;
        margin-left: 20px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    .navbar-nav .nav-link {
        margin-right: 30px;
    }

    .fa-right-to-bracket {
        font-size: 0.9em;
        margin-right: 0.5rem;
    }

    .fa-user {
        font-size: 0.8em;
        margin-right: 0.4rem;
    }

    .modal-content {
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.096), 0 6px 20px rgba(0, 0, 0, 0.096);
    }

    /* Footer Styles */
    footer {
        font-size: 0.9rem;
    }
    
    footer a {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s;
    }
    
    footer a:hover {
        opacity: 0.8;
    }
    
    .social-icons a {
        display: inline-block;
        width: 32px;
        height: 32px;
        line-height: 32px;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }
</style>