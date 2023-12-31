<form method="POST" action="{{route($tag->id?'tags.update':'tags.store', $tag->id?["tag"=> $tag->id]: [])}}">
    @csrf
    @method($tag->id?'PUT':'POST')
    <div class="container mt-2">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <label for="intituleTag">Intitulé du tag : </label>
                            <input class="form-control" type="text" id="intituleTag" name="intituleTag" value="{{old('intituleTag') ? '' : $tag->intituleTag}}">
                            @error('intituleTag')
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
