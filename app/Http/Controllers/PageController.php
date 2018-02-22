<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index($id)
    {

        $page = Page::findOrFail($id);
        if($page->access == 'private' && !Auth::check()) {
            return redirect()->guest('login');
        }
        $page->visit++;
        $page->save();
        return view('page.index',['page' => $page]);
    }

    public function slug($id,$slug)
    {
        $page = Page::findOrFail($id);
        if($page->access == 'private' && !Auth::check()) {
            return redirect()->guest('login');
        }
        $page->visit++;
        $page->save();
        return view('page.index',['page' => $page]);
    }

    public function contactUs()
    {
        $page = Page::findOrFail(config('platform.contact-us-page-id'));
        $page->visit++;
        $page->save();
        return view('page.index',['page' => $page]);
    }

    public function aboutUs()
    {
        $page = Page::findOrFail(config('platform.about-us-page-id'));
        $page->visit++;
        $page->save();
        return view('page.index',['page' => $page]);
    }
}
