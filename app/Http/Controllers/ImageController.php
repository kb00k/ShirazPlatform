<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;


class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function upload(Request $request)
    {

    }
}
