<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function login(){
        return view('login');
    }
    public function processLogin(Request $request){
        //register validation and stuff
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            // Authentication successful
            $user = Auth::user();
            // dd($user);
            return redirect()->route('home');
        } else {
            // Authentication failed
            return back()->withErrors(['login' => 'Invalid username or password.'])->withInput();
        }

        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
        return view('register');
    }
    public function processRegister(Request $request){
        //register validation and stuff
        $validatedData = $request->validate([
            'username' => 'required|min:4|unique:User,username',
            'email' => 'required|email|unique:User,email',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'The username field is required.',
            'username.min' => 'The username must be at least :min characters.',
            'username.unique' => 'Username is already taken',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
        ]);

        $user = new UserModel();
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('login');
    }
}
