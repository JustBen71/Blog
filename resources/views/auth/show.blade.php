@extends('layout')

@section('titre', 'Users')

@section('titrePage', 'Mon profil')

@section('contenu')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                @include('auth.form')
            </div>
        </div>
    </div>
@endsection
