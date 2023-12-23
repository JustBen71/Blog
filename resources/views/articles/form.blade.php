<form method="POST" action="{{route($article->id?'articles.update':'articles.store', $article->id?["article"=> $article->id]: [])}}">
    @csrf
    @method($article->id?'PUT':'POST')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <label for="titrearticle">Titre : </label>
                            <input class="form-control" type="text" id="titrearticle" name="titrearticle" value="{{old('titrearticle') ? '' : $article->titrearticle}}">
                            @error('titrearticle')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="ageviser">Age requis :</label>
                            <input class="form-control" type="number" id="ageviser" name="ageviser" value="{{old('ageviser') ? '' : $article->ageviser}}"/>
                            @error('ageviser')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="descriptionarticle">Description : </label>
                            <textarea id="editor" name="descriptionarticle">{{ old('descriptionarticle', $article->descriptionarticle ?? '') }}</textarea>
                            @error('descriptionarticle')
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
                            <label for="user_id">Proprietaire : </label>
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @selected(old('user_id', $article->user_id) == $user->id) >{{$user->prenom}} {{$user->nom}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    @foreach($tags as $tag)
                        <div class="row">
                            <div class="col-12">
                                <label>{{$tag->name}}</label>
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
