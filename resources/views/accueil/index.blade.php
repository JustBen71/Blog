@extends('layout')

@section('titre', 'Accueil')


@auth
    @section('titrePage', 'Bonjour '.$user->nomUtilisateur.', voici les derniers articles publiés')
@endauth
@guest
    @section('titrePage', 'Derniers articles publiés !')
@endguest

@section('contenu')
    <div class="container">
        @if(sizeof($articles) <= 0)
            <div class="row">
                <p>Il n'y a pas d'articles publiés pour l'instant.</p>
            </div>
        @else
            <div class="row mt-2">
                @for($i = 0; $i < sizeof($articles); $i++)
                    <div class="col-3">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titreArticle}} <br>
                                @foreach($articles[$i]->tags as $tag)
                                    <span class="badge rounded-pill text-bg-danger">{{$tag->intituleTag}}</span>
                                @endforeach
                            </div><br>
                            <div class="card-body overflow-hidden">
                                <p class="card-text">{!! $articles[$i]->contenuArticle !!}</p><a href="{{route('articles.show', ["article" => $articles[$i]])}}" class="stretched-link"></a>
                            </div>
                            <div class="card-footer bg-transparent border-secondary">Créateur : {{$articles[$i]->user->nomUtilisateur}} </div>
                        </div>
                    </div>
                @endfor
            </div>
        @endif
    </div>
@endsection
