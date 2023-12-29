@extends('layout')

@section('titre', 'Users')

@section('titrePage', 'Gestion des tags')

@section('contenu')
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                Intitulé du tag : {{$tag->intituleTag}}
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
