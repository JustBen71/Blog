@extends('layout')
@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                <h1 class="text-center">Modification d'un utilisateur</h1>
            </div>
            <div class="col-4">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('users.form')
            </div>
        </div>
    </div>
@endsection
