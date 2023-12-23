@extends('layout')
@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" class="vstack gap-3">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
