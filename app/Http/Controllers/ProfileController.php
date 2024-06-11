<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    // public function article($id)
    // {
    //     $articles = Article::where('user_id', '=', $id);
    //     return view('profile.article.index', $articles);
    // }
    public function article($id)
    {
        $articles = Article::where('user_id', '=', $id)->get();
        return view('profile.article.index', ['articles' => $articles]);
    }
}
