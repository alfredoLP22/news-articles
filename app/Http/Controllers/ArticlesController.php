<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


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
}
