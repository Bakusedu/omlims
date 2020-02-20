<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Patient;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
       $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = htmlspecialchars(strtolower(trim($request->email)));

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/home')->with(['user' => Auth::user()]);
        }
        else {
            $errors = new \Illuminate\Support\MessageBag();

            // add your error messages:
            $errors->add('Please try again','Wrong login credentials');

            return redirect()->back()->withErrors($errors);
        }

        // check if any of the login credentials is empty

        
    }

    public function logout()
    {
        Auth::logout();
	    return redirect('/');
    }
}
