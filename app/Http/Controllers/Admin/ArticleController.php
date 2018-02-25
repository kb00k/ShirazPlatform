<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        return view('admin.article.index');
    }

    public function data()
    {
        return DataTables::eloquent(Page::select(['id','title','visit']))
            ->addColumn('action', 'admin.page.action')
            ->make(true);
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit',['page' => $page]);
    }

    public function insert(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
            'access' => 'required',
        ])->validate();
        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->text = $request->text;
        $page->access = $request->access;
        $page->save();
        flash('صفحه با موفقیت ایجاد شد.')->success();
        return redirect()->route('admin.page');
    }

    public function update($id, Request $request)
    {
        $page = Page::findOrFail($id);
        Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
            'access' => 'required',
        ])->validate();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->text = $request->text;
        $page->access = $request->access;
        $page->save();
        flash('صفحه با موفقیت ویرایش شد.')->success();
        return redirect()->route('admin.page.edit',['id' => $page->id]);
    }

    public function delete($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        flash('صفحه با موفقیت حذف شد.')->success();
        return redirect()->route('admin.page');
    }
}
