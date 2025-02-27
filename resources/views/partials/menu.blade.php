<style>
    .custom-dropdown {
        background-color: transparent;
        /* o il colore desiderato */
        border: true;
        /* rimuove il bordo se non vuoi che appaia */
    }

    .custom-dropdown .dropdown-item {
        color: inherit;
        /* mantiene il colore del testo come nel menu principale */
    }

    .custom-dropdown .dropdown-item:hover {
        background-color: rgba(94, 83, 40, 0.1) !important;
        /* colore di sfondo al passaggio del mouse */
        color: #7eed7efb !important;
        /* Colore lime per il testo */
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Immagine a sinistra -->
        <a class="navbar-brand" href="#">
            <img src="{{ Storage::disk('s3')->url('img/elleffe_V2_r.png') }}" alt="Logo" width="70" height="38"
                class="d-inline-block align-text-top">
        </a>

        <!-- Bottone di toggle per i dispositivi mobili -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collegamenti del menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Home e About -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">ABOUT</a>
                </li>
            </ul>

            <!-- Login e Register per gli ospiti (utenti non autenticati) -->
            @guest
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">LOGIN</a>
                    </li>
                </ul>
            @endguest

            <!-- Logout per gli utenti autenticati -->
            @auth
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user') }}">USER</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            DASHBOARD
                        </a>
                        <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-white" href="{{url('/products/create')}}">CREATE</a></li>
                            <li><a class="dropdown-item text-white" href="{{url('/products')}}">ALL PRODUCT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="d-inline">
                            @csrf
                            <a href="#" class="nav-link text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                LOGOUT
                            </a>
                        </form>
                    </li>
                </ul>
            @endauth

        </div>
    </div>
</nav>