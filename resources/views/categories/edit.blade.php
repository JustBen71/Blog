@extends('layout')

@section('titrePage', 'Modification d\'une catégorie')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('categories.form')
            </div>
        </div>
    </div>

@endsection
