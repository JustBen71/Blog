<form method="POST" action="{{route($user->id?'auth.update':'register')}}">
    @csrf
    @method($user->id?'PUT':'POST')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <label for="nomUtilisateur">Nom d'utilisateur : </label>
                <input class="form-control" type="text" id="nomUtilisateur" name="nomUtilisateur" value="{{old('nomUtilisateur') ? '' : $user->nomUtilisateur}}">
                @error('nomUtilisateur')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="mailUtilisateur">Email : </label>
                <input class="form-control" type="email" id="mailUtilisateur" name="mailUtilisateur" value="{{old('mailUtilisateur')? '': $user->mailUtilisateur}}">
                @error('mailUtilisateur')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="password">Password : </label>
                <input class="form-control" type="password" id="password" name="password" value="">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="password_confirmation">Confirmer le mot de passe : </label>
                <input class="form-control" type="password" id="password" name="password_confirmation" value="">
                @error('password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            @auth
                <div class="col-3 mt-1">
                    <button class="btn btn-primary" type="submit">Modifier mon profil</button>
                </div>
            @endauth
            @guest
                <div class="col-3 mt-1">
                    <button class="btn btn-primary" type="submit">Créer mon profil</button>
                </div>
            @endguest
        </div>
    </div>
</form>
