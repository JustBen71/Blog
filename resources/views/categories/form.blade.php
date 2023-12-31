<form method="POST" action="{{route($categorie->id?'categories.update':'categories.store', $categorie->id?["categorie"=> $categorie->id]: [])}}">
    @csrf
    @method($categorie->id?'PUT':'POST')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <label for="intituleCategorie">Nom de la catégorie : </label>
                            <input class="form-control" type="text" id="intituleCategorie" name="intituleCategorie" value="{{old('intituleCategorie') ? '' : $categorie->intituleCategorie}}">
                            @error('intituleCategorie')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mt-1">
                <button class="btn boutonPrincipal" type="submit">Envoyer</button>
            </div>
        </div>
    </div>
</form>
