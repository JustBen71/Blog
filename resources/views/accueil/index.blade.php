@extends('layout')

@section('titre', 'Accueil')


@auth
    @section('titrePage', 'Bonjour '.$user->nomUtilisateur.', voici les articles tendances')
@endauth
@guest
    @section('titrePage', 'Articles tendances !')
@endguest

@section('contenu')
    <div class="container">
        <div class="row">
            @if(sizeof($articles) <= 0)
                <p>Il n'y a pas d'articles publiés pour l'instant.</p>
            @else
                @for($i = 0; $i < sizeof($articles); $i++)
                    @if($i % 4 == 0 && $i > 0)
                </div>
                @endif
                @if($i % 4 == 0)
                    <div class="row mt-2">
                        <div class="col-3">
                            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titreArticle}}
                                    @foreach($articles[$i]->tags as $tag)
                                        <span class="badge rounded-pill text-bg-danger">{{$tag->intituleTag}}</span>
                                    @endforeach
                                </div><br>
                                <div class="card-body">
                                    @foreach($articles[$i]->tags as $tag)
                                        <span class="badge rounded-pill text-bg-danger">{{$tag->name}}</span>
                                    @endforeach
                                    <p class="card-text">{!! $articles[$i]->contenuArticle !!}</p>
                                    <a href="{{route('articles.show', ["article" => $articles[$i]])}}" class="stretched-link"></a>
                                </div>
                                <div class="card-footer bg-transparent border-secondary">Créateur : {{$articles[$i]->user->nomUtilisateur}} </div>
                            </div>
                        </div>
                        @else
                            <div class="col-3">
                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titreArticle}} <br>
                                        @foreach($articles[$i]->tags as $tag)
                                            <span class="badge rounded-pill text-bg-danger">{{$tag->intituleTag}}</span>
                                        @endforeach
                                    </div><br>
                                    <div class="card-body">
                                        <p class="card-text">{!! $articles[$i]->contenuArticle !!}</p><a href="{{route('articles.show', ["article" => $articles[$i]])}}" class="stretched-link"></a>
                                    </div>
                                    <div class="card-footer bg-transparent border-secondary">Créateur : {{$articles[$i]->user->nomUtilisateur}} </div>
                                </div>
                            </div>
                        @endif
                        @endfor
            @endif
        </div>
    </div>
@endsection
