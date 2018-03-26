<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home');
    }

    public function home(Request $request)
    {
        dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password'=>$request->password]))
        {
            $user = User::where('email',$request->email)->first();
            if($user->is_admin()){
                return redirect()->route('admin_home');
            }
            return redirect()->route('user_home');
        }
    }
}
