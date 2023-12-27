@extends('layout')

@section('titre', 'Users')

@section('titrePage', 'Gestion des articles')

@section('contenu')
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                <h2>{{$article->titreArticle}}</h2>@foreach($article->tags as $tag)
                    <span class="badge rounded-pill text-bg-danger">{{$tag->intituleTag}}</span>
                @endforeach
            </div>
            <div class="col-4">

            </div>
        </div>
        <label>Description :</label>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! $article->contenuArticle !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3">
                <a href="{{route("articles.index")}}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection
