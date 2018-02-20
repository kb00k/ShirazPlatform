<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {

        return view('user.profile');
    }

    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6|different:current_password',
            'password_confirmation' => 'required|min:6|different:current_password',
        ])->validate();
        $user = User::findOrFail(Auth::user()->id);
        if (Auth::attempt(['mobile' => $user->mobile, 'password' => $request->current_password])) {
            $user->password = bcrypt($request->password);
            $user->save();
            flash('رمز با موفقیت ویرایش شد.')->success();
            return redirect()->route('password');
        } else {
            flash('اطلاعات کاربری با موفقیت ویرایش شد.')->error();
            return redirect()->route('password');
        }
    }

    public function updateProfile(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'mobile' => 'required|numeric|unique:users,mobile,' . Auth::user()->id,
            'name' => 'required|string'
        ])->validate();
		$user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();
        flash('اطلاعات کاربری با موفقیت ویرایش شد.')->success();
        return redirect()->route('profile');
    }
}
