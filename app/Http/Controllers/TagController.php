<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieFormRequest;
use App\Http\Requests\TagFormRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('tags.index', ["tags" => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.new', ["tag" => new Tag()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagFormRequest $request)
    {
        $tag = Tag::create([
            'intituleTag' => $request->input('intituleTag')
        ]);

        return redirect()->route('home')->with('success', 'Le tag "'.$tag->intituleTag.'" a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag): View
    {
        return view('tags.show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', ["tag" => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagFormRequest $request, Tag $tag)
    {
        $tag->update([
            'intituleTag' => $request->input('intituleTag'),
        ]);

        return redirect()->route('tags.show', ['tag' => $tag->id])->with('success', 'Le tag a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index', ["tag" => Tag::all()])->with('success', 'Le tag a bien été supprimé');;
    }
}
