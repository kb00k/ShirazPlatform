<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller
{
    public function index($id)
    {
        $page = Page::findOrFail($id);
        return view('page.index',['page' => $page]);
    }

    public function slug($id,$slug)
    {
        $title = str_slug("در باره ما", "-");
        echo $title;
        $page = Page::findOrFail($id);
        return view('page.index',['page' => $page]);
    }

    public function contactUs()
    {
        $page = Page::findOrFail(config('platform.contact-us-page-id'));
        return view('page.index',['page' => $page]);
    }

    public function aboutUs()
    {
        $page = Page::findOrFail(config('platform.about-us-page-id'));
        return view('page.index',['page' => $page]);
    }
}
