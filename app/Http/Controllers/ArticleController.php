<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('articles.index', ["articles" => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        $tags = Tag::all();
        $categories = Categorie::all();
        return view('articles.new', ["article" => $article, "categories" => $categories, "tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleFormRequest $request)
    {
        $article = Article::create([
            'titreArticle' => $request->input('titreArticle'),
            'contenuArticle' => $request->input('contenuArticle'),
            'categorie_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
        ]);

        $article->tags()->sync($request->input('tags'));

        return redirect()->route('articles.index', ["articles" => Article::all()])->with('success', 'L\'article a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        return view('articles.show', ['article' => $article]);
    }

    public function showByUser(): View
    {
        $articles = Article::where('user_id', Auth::user()->id)->get();
        return view('articles.showByUser', ['articles' => $articles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        $categories = Categorie::all();
        return view('articles.edit', ["article" => $article, "tags" => $tags, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update([
            'titreArticle' => $request->input('titreArticle'),
            'contenuArticle' => $request->input('contenuArticle'),
            'categorie_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
        ]);

        $article->tags()->sync($request->input('tags'));

        return redirect()->route('articles.show', ['article' => $article->id])->with('success', 'L\'article a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.showByUser')->with('success', 'L\'article a bien été supprimé');;
    }
}
