<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // return login page
    public function loginpage() {
        if (auth()->check()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        return view('/login');
    }

    // return signup page
    public function signuppage() {
        return view('signup');
    }

    // create new user
    public function createnewuser(Request $request) {
        // check input
        if (trim($request->name) === "" || trim($request->email) === "" || trim($request->password) === "" ||trim($request->confirm_password) === "" ) {
            return view('signup', [
                "error" => "Visiem ievades laukiem ir jābūt aizpildītiem."
            ]);
        } elseif ($request->confirm_password !== $request->password) {
            return view('signup', [
                "error" => "Ievadītās paroles nesakrīt."
            ]);
        } elseif (strlen($request->password)<8) {
            return view('signup', [
                "error" => "Parole ir par īsu."
            ]);
        } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return view('signup', [
                "error" => "E-pasts nav pareizs."
            ]);
        } 
        $users = User::all();
        foreach ($users as $eachUser) {
            if ($eachUser->email === $request->email) {
                return view('signup', [
                    "error" => "E-pasts jau ir izmantots."
                ]);
            }
        }
            
        // save new user to database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        // signin user and redirect to item table page
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect('table');
    }

    // logout user and return login page
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    } 

    // login user and redirect to item table view
    public function loginexistinguser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('table');
        }
        return redirect('/')->withErrors(['error' => 'Error']);
    }
}
