<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
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
        $users = User::all();
        $tags = Tag::all();
        return view('articles.new', ["article" => $article, "users" => $users, "tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleFormRequest $request)
    {
        $article = Article::create([
            'titrearticle' => $request->input('titrearticle'),
            'descriptionarticle' => $request->input('descriptionarticle'),
            'ageviser' => $request->input('ageviser'),
            'user_id' => $request->input('user_id'),
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $users = User::all();
        $tags = Tag::all();
        return view('articles.edit', ["article" => $article, "users" => $users, "tags" => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update([
            'titrearticle' => $request->input('titrearticle'),
            'descriptionarticle' => $request->input('descriptionarticle'),
            'ageviser' => $request->input('ageviser'),
            'user_id' => $request->input('user_id'),
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
        return redirect()->route('articles.index', ["articles" => Article::all()])->with('success', 'L\'article a bien été supprimé');;
    }
}
