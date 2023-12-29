@extends('layout')

@section('titre', 'Articles')

@section('titrePage', 'Liste des articles')

@section('contenu')
    <div class="container">
        <div class="row mt-2">
            <div class="col-4">
                <input class="form-control" type="search" placeholder="Titre de l'article ..."/>
            </div>
            <div class="col-6">

            </div>
            <div class="col-2">
                <a class="btn btn-primary" href="{{route('articles.new')}}">Créé un article</a>
            </div>
        </div>
        <div class="row">
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
                                <div class="card-footer bg-transparent border-secondary">Créé par {{$articles[$i]->user->nomUtilisateur}} le {{$articles[$i]->created_at->format('d/m/Y')}}</div>
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
                                    <div class="card-footer bg-transparent border-secondary">Créé par {{$articles[$i]->user->nomUtilisateur}} le {{$articles[$i]->created_at->format('d/m/Y')}} </div>
                                </div>
                            </div>
                       @endif
            @endfor
        </div>
    </div>
@endsection
