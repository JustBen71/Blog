@extends('layout')

@section('titrePage', 'Connexion')

@section('contenu')
    <form method="POST" class="vstack gap-3">
            <div class="row">
                <div class="col-6">
                @csrf
                <div class="form-group">
                    <label for="mailUtilisateur">Email :</label>
                    <input type="email" class="form-control" name="mailUtilisateur" value="{{old('mailUtilisateur')}}" required>
                    @error('mailUtilisateur')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>


                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Se connecter</button>
                </div>
            </div>
        </div>
    </form>
@endsection
