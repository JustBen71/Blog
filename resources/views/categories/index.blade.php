@extends('layout')

@section('titre', 'Accueil')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <table class="table-striped">
                    <thead>
                        <th>Numéro</th>
                        <th>Nom catégorie</th>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->intituleArticle}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
