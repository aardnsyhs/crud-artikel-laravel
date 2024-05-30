<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class articleController extends Controller
{
    public function index() {
        $articles = Article::join('categories', 'articles.category_id', '=', 'categories.id')
                            ->join('users', 'articles.user_id', '=', 'users.id')
                            ->select('articles.*', 'categories.category_name', 'users.name as author_name')
                            ->get();
        return view('article.index', ['articles' => $articles]);
    }

    public function create() {
        $user = Auth::user();
        $categories = Category::all();
        return view('article.create', [
            'authorName' => $user->name,
            'categories' => $categories,
        ]);
    }   

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'publish_date' => 'required|date'
        ]);

        Article::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'publish_date' => $request->publish_date
        ]);

        return redirect()->route('article.index')->with('success', 'Article posted successfully!');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
    
        $categories = Category::all();
    
        $articleCategory = Category::join('articles', 'categories.id', '=', 'articles.category_id')
                                    ->where('articles.id', $id)
                                    ->select('categories.*')
                                    ->first();
    
        return view('article.edit', [
            'article' => $article,
            'articleCategory' => $articleCategory,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' =>'required|string|max:255',
            'description' =>'required|string',
            'category_id' =>'exists:categories,id',
        ]);

        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('article.index')->with('success', 'Article updated successfully!');
    }

    public function show($id) {
        $article = Article::join('users', 'articles.user_id', '=', 'users.id')
    ->select('articles.*', 'users.name as author_name')
    ->findOrFail($id);

        return view('article.show', [
            'article' => $article
        ]);
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article deleted successfully!');
    }
    
}
