@extends('layout')

@section('titre', 'Users')

@section('contenu')
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->nomUtilisateur}}</h5>
                        <a href="mailto:{{$user->mailUtilisateur}}" class="card-link">{{$user->mailUtilisateur}}</a>
                    </div>
                </div>
            </div>
            <div class="col-4">

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <a class="btn btn-secondary" href="{{route('accueil.home')}}">Retour</a>
            </div>
            <form method="POST" action="{{route('users.delete', ['user' => $user->id])}}">
                @csrf
                @method('DELETE')
                <div class="col-3 mt-1">
                    <button class="btn btn-danger" type="submit">Supprimer mon compte</button>
                </div>
            </form>
        </div>
    </div>
@endsection
