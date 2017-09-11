<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showAll()
    {
        $articles = Article::limit(5)->orderBy('id', 'desc')->get();

        return view('articles', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('article', ['article' => $article]);
    }

    public function search(Request $request)
    {
        $articles = Article::where('title', 'like', '%' . $request->get('query', '') . '%')->get();

        return fractal()
            ->collection($articles)
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }
}
