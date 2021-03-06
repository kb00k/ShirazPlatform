<?php

namespace App\Http\Controllers;

use App\Page;
use App\Article;
use App\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::limit(5)->orderBy('created_at', 'desc')->get();
        $files = File::limit(5)->orderBy('created_at', 'desc')->get();
        $page = Page::findWithCache(config('platform.index-page-id'));
        return view('home.index',['page' => $page, 'files' => $files, 'articles' => $articles]);
    }

    public function getLastArticles()
    {

    }

    public function  getLastFileUpdates()
    {

    }
}
