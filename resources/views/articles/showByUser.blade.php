@extends('layout')

@section('titre', 'Accueil')

@section('titrePage', 'Gestion de mes articles')

@section('contenu')
    <div class="container">
        <div class="row mt-2 d-flex flex-row-reverse">
            <div class="col-1">
                <a class="btn boutonPrincipal" href="{{route('articles.new')}}"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
        <div class="row justify-content-center">
            @for($i = 0; $i < sizeof($articles); $i++)
                @if($i % 4 == 0 && $i > 0)
                </div>
                @endif
                @if($i % 4 == 0)
                    <div class="row mt-2">
                        <div class="col-3">
                            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titreArticle}}
                                    <a class="btn btn-warning" href="{{route("articles.edit", ["article" => $articles[$i]->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                                            <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{route("articles.delete", ["article" => $articles[$i]->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <br>
                                    @foreach($articles[$i]->tags as $tag)
                                        <span class="badge rounded-pill text-bg-danger">{{$tag->intituleTag}}</span>
                                    @endforeach
                                </div><br>
                                <div class="card-body">
                                    @foreach($articles[$i]->tags as $tag)
                                        <span class="badge rounded-pill text-bg-danger">{{$tag->name}}</span>
                                    @endforeach
                                    <p class="card-text">{!! $articles[$i]->contenuArticle !!}</p>
                                </div>
                                <div class="card-footer bg-transparent border-secondary">Créé le {{$articles[$i]->created_at->format('d/m/Y')}}</div>
                            </div>
                        </div>
                        @else
                            <div class="col-3">
                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg-transparent border-secondary text-center">{{$articles[$i]->titreArticle}}
                                        <a class="btn btn-warning" href="{{route("articles.edit", ["article" => $articles[$i]->id])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                                                <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{route("articles.delete", ["article" => $articles[$i]->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <br>
                                        @foreach($articles[$i]->tags as $tag)
                                            <span class="badge rounded-pill text-bg-danger">{{$tag->intituleTag}}</span>
                                        @endforeach
                                    </div><br>
                                    <div class="card-body">
                                        <p class="card-text">{!! $articles[$i]->contenuArticle !!}</p>
                                    </div>
                                    <div class="card-footer bg-transparent border-secondary">Créé le {{$articles[$i]->created_at->format('d/m/Y')}}</div>
                                </div>
                            </div>
                        @endif
                        @endfor
                        <!-- Pagination -->
                        <ul class="pagination justify-content-center mb-4">
                            {{$articles->links("pagination::bootstrap-4")}}
                        </ul>
                    </div>
    </div>
@endsection
