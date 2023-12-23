@extends('layout')

@section('titre', 'Accueil')

@section('contenu')
    <div class="container">
        <div class="row">
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
                    <div class="row">
                        <div class="col-3">
                            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titrearticle}} <br><span class="blockquote-footer">Age requis : {{$articles[$i]->ageviser}}</span></div>
                                <div class="card-body">

                                    @foreach($articles[$i]->tags as $tag)
                                        <span class="badge rounded-pill text-bg-danger">{{$tag->name}}</span>
                                    @endforeach
                                    <p class="card-text">{!! $articles[$i]->contenuArticle !!}</p>
                                    <a href="{{route('articles.show', ["article" => $articles[$i]])}}" class="stretched-link"></a>
                                </div>
                                <div class="card-footer bg-transparent border-secondary">{{$articles[$i]->user ? $articles[$i]->user->prenom : "Utilisateur inconnue"}} {{$articles[$i]->user ? $articles[$i]->user->nom : ""}} <img class="image-profile" style=" height: 20px; border-radius: 50%;" src="{{$articles[$i]->user ? '/'.$articles[$i]->user->image : ''}}" /></div>
                            </div>
                        </div>
                        @else
                            <div class="col-3">
                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titrearticle}}<br><span class="blockquote-footer">Age requis : {{$articles[$i]->ageviser}}</span></div>
                                    <div class="card-body">
                                        @foreach($articles[$i]->tags as $tag)
                                            <span class="badge rounded-pill text-bg-danger">{{$tag->name}}</span>
                                        @endforeach
                                        <p class="card-text">{!! $articles[$i]->descriptionarticle !!}</p><a href="{{route('articles.show', ["article" => $articles[$i]])}}" class="stretched-link"></a>
                                    </div>
                                    <div class="card-footer bg-transparent border-secondary">{{$articles[$i]->user ? $articles[$i]->user->prenom : "Utilisateur inconnue"}} {{$articles[$i]->user ? $articles[$i]->user->nom : ""}} <img class="image-profile" style=" height: 20px; border-radius: 50%;" src="{{$articles[$i]->user ? '/'.$articles[$i]->user->image : ''}}"/></div>
                                </div>
                            </div>
                       @endif
            @endfor
        </div>
    </div>
@endsection
