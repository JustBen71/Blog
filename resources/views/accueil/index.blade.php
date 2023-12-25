@extends('layout')

@section('titre', 'Accueil')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="text-center col-12">
                @auth
                    <h1>Bonjour {{$user->nomUtilisateur}}, voici les articles tendances</h1>
                @endauth
                @guest
                    <h1>Articles tendances !</h1>
                @endguest
            </div>
        </div>
        <div class="row">

        </div>
    </div>
@endsection
