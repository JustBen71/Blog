<form method="POST" action="{{route($user->id?'users.update':'users.store', $user->id?["user"=> $user->id]: [])}}" enctype="multipart/form-data">
    @csrf
    @method($user->id?'PUT':'POST')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <label for="nomUtilisateur">Nom : </label>
                <input class="form-control" type="text" id="nomUtilisateur" name="nomUtilisateur" value="{{old('nomUtilisateur') ? '' : $user->nomUtilisateur}}">
                @error('nomUtilisateur')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="prenom">Prénom : </label>
                <input class="form-control" type="text" id="prenom" name="prenom" value="{{old('prenom')? '': $user->prenom}}">
                @error('prenom')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="mailUtilisateur">Email : </label>
                <input class="form-control" type="email" id="mailUtilisateur" name="mailUtilisateur" value="{{old('mailUtilisateur')? '': $user->mailUtilisateur}}">
                @error('mailUtilisateur')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label for="passwordUtilisateur">Password : </label>
                            <input class="form-control" type="password" id="passwordUtilisateur" name="passwordUtilisateur" value="">
                            @error('passwordUtilisateur')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="password_confirmation">Confirmer le mot de passe : </label>
                            <input class="form-control" type="password" id="password" name="password_confirmation" value="">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mt-1">
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </div>
        </div>
    </div>
</form>
