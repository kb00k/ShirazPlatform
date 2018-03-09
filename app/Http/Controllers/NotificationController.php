<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function countUnread()
    {
        return response()->json([
            'unread' => Auth::user()->unreadNotifications->count()
        ]);
    }

    public function getUnread()
    {
        return response()->json([
            'unread' => Auth::user()->unreadNotifications
        ]);
    }
}
