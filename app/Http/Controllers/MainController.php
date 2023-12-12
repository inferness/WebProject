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
use App\Models\FollowedCommunityModel;
use App\Models\FollowedCommunityModelModel;
use App\Models\PostModel;
use App\Models\UserUpvotesModel;
use Usamamuneerchaudhary\Commentify\Models\Comment;

class MainController extends Controller
{
    //
    public function landingPage(){
        $user = Auth::user();

        // dd($user);
        return view('landing');
    }

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
            'username' => 'required|min:4|unique:Users,username',
            'email' => 'required|email|unique:Users,email',
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

        // $uniqueNumber = $faker->unique()->numberBetween(1,9999);
        // $formatNumber = sprintf('%04d', $uniqueNumber);
        // $uniqueID = 'US' . $formatNumber;
        // $user->UserId = $uniqueID;

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
        $community->Owner = auth()->user()->id;
        // dd(auth()->User());

        if ($request->hasFile('file_input')) {
            $uploadedFile = $request->file('file_input');
            $filePath = $uploadedFile->storeAs('public/images/community', $community->CommunityId . '.jpg');
            $community->BannerPath = 'storage/images/community/' . $community->CommunityId . '.jpg';
        }
        else{
            $community->BannerPath = 'storage/images/default/defaultBanner.jpg';
        }

        $community->save();

        return redirect()->route('home');
    }

    public function communityPage($communityId)
    {
        $userId = auth()->user()->id;
        // Fetch the community from the database
        $community = CommunitiesModel::where('CommunityId', $communityId)->first();
        $posts = PostModel::where('CommunityId', $communityId)->get();
        // dd($posts);
        $following = FollowedCommunityModel::where('CommunityId', $communityId)->where('user_id', $userId)->first();

        // Return the community page view with the community data
        return view('community', compact('community', 'posts', 'following'));
    }

    public function createPost($CommunityId){
        if(Auth::check()){
            $community = CommunitiesModel::where('CommunityId', $CommunityId)->first();
            return view('createPost', compact('community'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function createPostForm($communityId, Request $request){

        $faker = Faker::create();
        $post = new PostModel();

        $uniqueNumber = $faker->unique()->numberBetween(1,9999);
        $formatNumber = sprintf('%04d', $uniqueNumber);
        $uniqueID = 'PO' . $formatNumber;
        // dd($post->id);
        $title = $request->input('title');
        $description = $request->input('description');

        $post->CommunityId = $communityId;
        $post->Title = $title;
        $post->Description = $description;
        $post->UserId = auth()->user()->id;

        if ($request->hasFile('file_input')) {
            $uploadedFile = $request->file('file_input');
            $filePath = $uploadedFile->storeAs('public/images/posts', $uniqueID . '.jpg');
            $post->ImagePath = 'storage/images/posts/' . $uniqueID . '.jpg';
            $post->HasImage = true;
        }
        else{
            $post->ImagePath = 'storage/images/default/defaultPost.jpg';
            $post->HasImage = false;
        }

        $post->save();

        return redirect()->route('communityPage', ['communityId'=>$communityId]);
    }

    public function postPage($id){

        if(Auth::check()){
            $userId = auth()->user()->id;
        }
        else{
            $userId=0;
        }

        $post = PostModel::where('id', $id)->first();
        $upvoted = UserUpvotesModel::where('user_id', $userId)->where('post_id', $id)->first();
        $commentCount = Comment::where('commentable_id', $id)->count();
        $following = FollowedCommunityModel::where('CommunityId', $post->InCommunity->CommunityId)->where('user_id', $userId)->first();

        return view('posts', compact('post', 'upvoted', 'commentCount', 'following'));
    }

    public function followCommunity($communityId){

        $follow = new FollowedCommunityModel();
        // dd($communityId);

        $follow->user_id = auth()->user()->id;
        $follow->CommunityId = $communityId;

        CommunitiesModel::where('CommunityId', $communityId)->increment('FollowerCount');
        $follow->save();

        return redirect()->route('communityPage', ['communityId'=>$communityId]);
    }

    public function unfollowCommunity($communityId){

        $userId = auth()->user()->id;

        // Find and delete the record with the given user and community IDs
        FollowedCommunityModel::where('user_id', $userId)
        ->where('CommunityId', $communityId)
        ->delete();

        CommunitiesModel::where('CommunityId', $communityId)->decrement('FollowerCount');

        return redirect()->route('communityPage', ['communityId'=>$communityId]);
    }

    public function upvotePost($postId){

        $follow = new UserUpvotesModel();
        // dd($communityId);

        $follow->user_id = auth()->user()->id;
        $follow->post_id = $postId;

        PostModel::where('id', $postId)->increment('UpvoteCount');
        $follow->save();

        return redirect()->route('postPage', ['postId'=>$postId]);
    }

    public function downvotePost($postId){

        $userId = auth()->user()->id;

        UserUpvotesModel::where('user_id', $userId)
        ->where('post_id', $postId)
        ->delete();

        PostModel::where('id', $postId)->decrement('UpvoteCount');

        return redirect()->route('postPage', ['postId'=>$postId]);
    }
}
