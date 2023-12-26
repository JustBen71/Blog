<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("accueil.home")}}"><img height="48" width="48" src="{{ asset('img/frog.png') }}"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("accueil.home")}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("articles.index")}}">Consulter les articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("articles.new")}}">Gestion de nos articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("categories.index")}}">Gestion des catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("tags.new")}}">Gestion des tags</a>
                </li>
                @auth

                    <form action="{{route("logout")}}" method="post">
                        @csrf
                        @method('POST')
                        <li class="nav-item">
                            <button class="nav-link" type="submit">Déconnexion</button>
                        </li>
                    </form>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("login")}}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("register")}}">Inscription</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
