@extends('layout')

@section('titrePage', 'Modification d\'un artricle')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('articles.form')
            </div>
        </div>
    </div>

@endsection
