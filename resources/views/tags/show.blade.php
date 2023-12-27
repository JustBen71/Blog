@extends('layout')

@section('titre', 'Users')

@section('contenu')
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                Nom catégorie : {{$tag->intituleTag}}
            </div>
            <div class="col-4">

            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <a class="btn btn-secondary" href="{{route("tags.index")}}">Retour</a>
            </div>
        </div>
    </div>
@endsection
