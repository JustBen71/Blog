@extends('layout')
@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <h1 class="text-center">Modification d'un tag</h1>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('tags.form')
            </div>
        </div>
    </div>

@endsection
