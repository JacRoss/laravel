<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Transformers\ArticleTransformer;
use Carbon\Carbon;
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

    public function showWeekly()
    {
        $articles = Article::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->copy()->endOfWeek()])
            ->get()
            ->groupBy('dayOfWeek')
            ->map(function ($value) {
                return $value->groupBy('category.name')
                    ->sortBy('category_id');
            });

        return view('weekly', ['weekly' => $articles]);
    }

    public function destroyForm()
    {
        $categories = Category::all();

        return view('destroy', ['categories' => $categories]);
    }

    public function destroy(DestroyArticleRequest $request)
    {
        Article::where('created_at', '<', $request->date)
            ->where('category_id', $request->category)
            ->delete();

        return back();
    }
}
