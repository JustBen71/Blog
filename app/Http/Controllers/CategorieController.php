<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Http\Requests\CategorieFormRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('categories.index', ["categories" => Categorie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.new', ["categorie" => new Categorie()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieFormRequest $request)
    {
        $categorie = Categorie::create([
            'intituleCategorie' => $request->input('intituleCategorie'),
        ]);
        return redirect()->route('accueil.home')->with('success', 'La catégorie a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie): View
    {
        return view('categories.show', ['categorie' => $categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', ["categorie" => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieFormRequest $request, Categorie $categorie)
    {
        $categorie->update([
            'intituleCategorie' => $request->input('intituleCategorie'),
        ]);
        return redirect()->route('categories.show', ['categorie' => $categorie->id])->with('success', 'La catégorie a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index', ["articles" => Article::all()])->with('success', 'La catégorie a bien été supprimé');;
    }
}
