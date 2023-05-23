<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ArticlesController extends Controller
{
    public function index() {
        return view('articles');
    }
    public function getArticles(Request $request) {
        $limit = ($request->has('limit')) ? $request->input('limit') : 3;
        $articles = new Article;
        $relationships = $articles->relationships;
        $articles = $articles->with($relationships)->paginate($limit);
        return response()->json($articles);
    }

    public function getByBody(Request $request) {

        $articles = new Article;
        $relationships = $articles->relationships;
        $articles = Article::query()
        ->when(
            $request->input('search'),
            function(Builder $builder) use ($request) {
                $builder->where('body','like',"%{$request->input('search')}%");
            }
        )
        ->with($relationships)
        ->paginate(3);
        return response()->json($articles);
    }
}
