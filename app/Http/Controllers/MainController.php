<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CommunitiesModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;
use App\Models\CommunitiesModelModel;
use App\Models\FollowedCommunityModelModel;

class MainController extends Controller
{
    //
    public function home(){
        $user = Auth::user();

        // dd($user);
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
            return view('home');
        } else {
            // Authentication failed
            return back()->withErrors(['login' => 'Invalid username or password.'])->withInput();
        }

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
        $faker = Faker::create();

        $user = new UserModel();

        $uniqueNumber = $faker->unique()->numberBetween(1,9999);
        $formatNumber = sprintf('%04d', $uniqueNumber);
        $uniqueID = 'US' . $formatNumber;
        $user->UserId = $uniqueID;

        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('login');
    }

    public function createCommunity(){
        if(Auth::check()){
            return view('createCommunity');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function createCommunityForm(Request $request){
        $faker = Faker::create();
        $community = new CommunitiesModel();

        // dd($request);
        $uniqueNumber = $faker->unique()->numberBetween(1,9999);
        $formatNumber = sprintf('%04d', $uniqueNumber);
        $uniqueID = 'CO' . $formatNumber;
        $community->CommunityId = $uniqueID;

        $community->Name = $request->input('Name');
        $community->Description = $request->input('Description');
        $community->Owner = auth()->user()->UserId;

        if ($request->hasFile('file_input')) {
            $uploadedFile = $request->file('file_input');
            $filePath = $uploadedFile->storeAs('public/images/community', $community->CommunityId . '.jpg');
            $community->BannerPath = 'storage/images/community/' . $community->CommunityId . '.jpg';
        }

        $community->save();

        return redirect()->route('home');
    }

    public function communityPage($communityId)
    {
        // Fetch the community from the database
        $community = CommunitiesModel::where('CommunityId', $communityId)->first();

        // Return the community page view with the community data
        return view('community', compact('community'));
    }
}
