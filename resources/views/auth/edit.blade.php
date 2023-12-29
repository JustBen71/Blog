@extends('layout')

@section('titrePage', 'Connexion')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('auth.form')
            </div>
        </div>
    </div>
@endsection
