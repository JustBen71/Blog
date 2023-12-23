<form method="POST"  enctype="multipart/form-data">
    @csrf
    @method($user->id?'PUT':'POST')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <label for="nom">Nom : </label>
                <input class="form-control" type="text" id="nom" name="nom" value="{{old('nom') ? '' : $user->nom}}">
                @error('nom')
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
            <div class="col-4">
                <label for="age">Age : </label>
                <input class="form-control" type="number" id="age" name="age" value="{{old('age')? '': $user->age}}">
                @error('age')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <label for="commentaire">Commentaire : </label>
                <input class="form-control" type="text" id="commentaire" name="commentaire" value="{{old('commentaire') ? '': $user->commentaire}}">
                @error('commentaire')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-2">
                <label for="image">Image Profil : </label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="email">Email : </label>
                <input class="form-control" type="email" id="email" name="email" value="{{old('email')? '': $user->email}}">
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label for="password">Password : </label>
                            <input class="form-control" type="password" id="password" name="password" value="">
                            @error('password')
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
