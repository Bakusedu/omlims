<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class StaffController extends Controller
{
    // register a new staff 
    public function store(Request $request)
    {
        $credentials =  $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'privileges' => 'required'
        ]);

        $user = new User();

        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->privileges = $credentials['privileges'];
        
        $user->save();

        Auth::login($user);
        // Authentication passed...
        return redirect('/home')->with(['user' => Auth::user()]);
    }
}
