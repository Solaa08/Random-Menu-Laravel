@extends("layouts.layout_client")

@section("content")
    <div class="text-center">
        <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">Random Menu</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#">Accueil</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/da') }}" class="nav-link">Administration</a>
                                <a href="/" class="nav-link">Mon compte</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Connexion</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link">Créer un compte</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                </div>
            </header>

            <div class="inner cover">
                <h1 class="cover-heading">Le générateur de menus</h1>
                <p class="lead">"Random Menu" est un site fondé par deux étudiants Ardennais. Il permet de générer aléatoirement des menus sur une période de 7j.</p>
                <p class="lead">
                    <a href="#" class="btn btn-lg btn-secondary">Commencer</a>
                </p>
            </div>

            <footer class="mastfoot mt-auto">

            </footer>
        </div>

        <!--

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- <img src="{{ asset('image/logo.jpg') }}" alt="logo" width="100px" height="100px"> --}}

            <div>
                <div class="container-fluid">
                    <div class="row vertical-center">
                        <a href="/table"><button class="btn btn-primary">Commencer</button></a>
                    </div>
                  </div>
            </div>
        </div>
        -->
    </div>
@endsection
