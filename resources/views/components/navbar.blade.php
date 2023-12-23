<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("home")}}"><img height="48" width="48" src="{{ asset('img/mickey.jpg') }}"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("home")}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("articles.index")}}">Consulter les articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("articles.new")}}">Créer un article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("categories.new")}}">Crée une catégorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("tags.new")}}">Crée un tag</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
