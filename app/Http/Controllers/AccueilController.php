<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $articles = Article::query()-> orderByDesc("created_at")->paginate(4);
        return view('accueil.index', ["user" => $user, "articles" => $articles]);
    }
}
