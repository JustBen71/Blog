@extends('layout')

@section('titrePage', 'Création d\'une catégorie')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('categories.form')
            </div>
        </div>
    </div>

@endsection
