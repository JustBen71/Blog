@extends('layout')

@section('titre', 'Users')

@section('titrePage', 'Connexion')

@section('contenu')
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">
                <img class="image-profile" style=" height: 250px; border-radius: 50%;" src="/{{$user->image}}"/>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->prenom}} {{$user->nom}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$user->age}} ans</h6>
                        <p class="card-text">{{$user->commentaire}}</p>
                        <a href="mailto:{{$user->email}}" class="card-link">{{$user->email}}</a>
                    </div>
                </div>
            </div>
            <div class="col-4">

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <a class="btn btn-secondary" href="{{route('users.index')}}">Retour</a>
            </div>
            <form method="POST" action="{{route('users.delete', ['user' => $user->id])}}">
                @csrf
                @method('DELETE')
                <div class="col-3 mt-1">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
