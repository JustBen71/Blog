@extends('layout')

@section('titrePage', 'Création d\'un article')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('articles.form')
            </div>
        </div>
    </div>

@endsection
