@extends('layout')

@section('titrePage', 'Création d\'un utilisateur')

@section('contenu')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('users.form')
                </div>
            </div>
        </div>

@endsection
