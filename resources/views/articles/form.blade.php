<form method="POST" action="{{route($article->id?'articles.update':'articles.store', $article->id?["article"=> $article->id]: [])}}">
    @csrf
    @method($article->id?'PUT':'POST')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <label for="titreArticle">Titre : </label>
                            <input class="form-control" type="text" id="titreArticle" name="titreArticle" value="{{old('titreArticle') ? '' : $article->titreArticle}}">
                            @error('titreArticle')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="contenuArticle">Description : </label>
                            <textarea id="editor" name="contenuArticle">{{ old('contenuArticle', $article->contenuArticle ?? '') }}</textarea>
                            @error('contenuArticle')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label>Catégorie</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->intituleCategorie}}</option>
                                @endforeach
                            </select>
                            @error('categorie')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <label class="mt-1">Les tags</label>
                    @foreach($tags as $tag)
                        <div class="row">
                            <div class="col-12">
                                <label>{{$tag->intituleTag}}</label>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $article->tags->contains($tag) ? 'checked' : '' }}>
                            </div>
                        </div>
                    @endforeach
                    @error('tags')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mt-1">
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
    </div>
</form>
