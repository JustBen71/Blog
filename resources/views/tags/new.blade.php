@extends('layout')

@section('titrePage', 'Création d\'un tag')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('tags.form')
            </div>
        </div>
    </div>

@endsection
