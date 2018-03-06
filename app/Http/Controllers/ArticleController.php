<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function view($id)
    {

        $article = Article::findWithCache($id);
        return view('article.view',['article' => $article]);
    }

    public function slug($id, $slug)
    {
        $article = Article::findWithCache($id);
        return view('article.view',['article' => $article]);
    }
}
