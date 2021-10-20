@extends("layouts.layout_client")

@section("content")
    @section("header")
    <div class="text-center">
        <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">Random Menu</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#">Accueil</a>
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                        @if (Route::has('login'))
                            @auth
                                @can('access_admin')
                                <a href="{{ url('admin/recette') }}" class="nav-link">Administration</a>
                                @endcan
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Deconnexion') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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
    @endsection

            <div class="inner cover">
                <h1 class="cover-heading">Le générateur de menus</h1>
                <p class="lead">"Random Menu" permet de se générer des menus simples tout au long d'une semaine afin de faciliter sa façon de cuisiner.</p>
                <p class="lead">
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('table') }}" class="btn btn-lg btn-secondary">Commencer</a>
                    @else
                    <a href="{{ url('login') }}" class="btn btn-lg btn-secondary">Commencer</a>
                    @endauth
                @endif

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
