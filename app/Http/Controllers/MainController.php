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
use Illuminate\Support\Facades\Validator;
use App\Models\SavedPostsModel;

class MainController extends Controller
{
    //
    public function landingPage(){
        $user = Auth::user();

        // dd($user);
        return view('landing');
    }

    public function home(){
        // dd($posts);
        $topCommunities = CommunitiesModel::orderByDesc('FollowerCount')->limit(5)->get();
        // dd($user);
        $recPosts = null;
        if(auth::check()){
            $userId = auth()->user()->id;
            $user = Auth::user();
            $followedCommunityIds = FollowedCommunityModel::where('user_id', $userId)->pluck('CommunityId')->toArray();
            if($followedCommunityIds){
                $recPosts = PostModel::whereIn('CommunityId', $followedCommunityIds)
                ->orderByDesc('UpvoteCount')
                ->limit(5)
                ->get();
            }
            else{
                $recPosts = PostModel::inRandomOrder()
                ->limit(5)
                ->get();
            }
        }
        else{
            $recPosts = PostModel::inRandomOrder()
            ->limit(5)
            ->get();
        }
        
        $posts = PostModel::orderByDesc('created_at')->paginate(5);
        return view('home', compact('posts', 'topCommunities', 'recPosts'));
    }

    public function savedPage(){
        if(Auth::check()){
            $userId = auth()->user()->id;
            $savedPosts = SavedPostsModel::where('user_id', $userId)->paginate(10);
            return view('saved', compact('savedPosts'));
        }
        else{
            return view('login');
        }
    }

    public function communities(){
        $communities = CommunitiesModel::orderByDesc('FollowerCount')->paginate(10);
        return view('Communities', compact('communities'));
    }

    public function profilePage(){
        if(Auth::check()){
            $user = auth()->user();
            $ownedCommunities = CommunitiesModel::where('Owner', $user->id)->get();
            return view('profile', compact('user', 'ownedCommunities'));
        }
        else{
            return view('login');
        }
    }

    public function profileForm(Request $request){

        $curUser = Auth::user();
        $user = UserModel::findOrFail($curUser->id);

        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'DOB' => 'nullable|date',
            'description' => 'nullable|string|max:255',
        ]);

        // Update user information
        $user->name = $request->input('name');
        $user->dateOfBirth = $request->input('DOB');
        $user->description = $request->input('description');
        $user->email = $curUser->email;
        $user->username = $request->input('username');
        $user->password = $curUser->password;

        if($request->hasFile('file_input')){
            $uploadedFile = $request->file('file_input');
            $extension = $uploadedFile->getClientOriginalExtension();
            $filePath = $uploadedFile->storeAs('public/images/avatar/', $user->id . '.' . $extension);
            $user->AvatarPath = 'storage/images/avatar/' . $user->id . '.' . $extension;
            $user->hasAvatar = true;
        }

        $user->save();

        return redirect()->route('profile');
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

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:255',
            'Description' => 'required|string|max:900',
            'file_input' => 'image|mimes:jpeg,png,jpg',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
            $extension = $uploadedFile->getClientOriginalExtension();
            $filePath = $uploadedFile->storeAs('public/images/community', $community->CommunityId . '.' . $extension);
            $community->BannerPath = 'storage/images/community/' . $community->CommunityId . '.' . $extension;
        }
        else{
            $community->BannerPath = 'images/default/defaultBanner.jpg';
        }

        $community->save();

        return redirect()->route('home');
    }

    public function deleteCommunity($communityId){
        $community = CommunitiesModel::findOrFail($communityId);

        $community->delete();

        return redirect()->route('profile')->with('success', 'Community deleted successfully.');
    }

    public function communityPage($communityId, Request $request)
    {
        
        // Fetch the community from the database
        $community = CommunitiesModel::where('CommunityId', $communityId)->first();
        $query = PostModel::where('CommunityId', $communityId);
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('Title', 'like', '%' . $searchTerm . '%');
        }

        $sortOptions = [
            'upvote' => 'Upvotes',
            'date' => 'Date',
        ];
    
        $sortField = $request->input('sort', 'upvote'); // Defaultnya berdasarkan upvote
        $sortDirection = $request->input('direction', 'desc'); //sama kaya atas
        
        switch ($sortField) {
            case 'upvote':
                $query->orderBy('UpvoteCount', $sortDirection);
                break;
            case 'date':
                $query->orderBy('created_at', $sortDirection);
                break;
        }
        $posts = $query->paginate(10);
        $topCommunities = CommunitiesModel::orderByDesc('FollowerCount')->limit(8)->get();
        // dd($posts);
        if(Auth::check()){
            $userId = auth()->user()->id;
            $following = FollowedCommunityModel::where('CommunityId', $communityId)->where('user_id', $userId)->first();
        }
        else{
            $following = null;
        }

        return view('community', [
            'community' => $community,
            'posts' => $posts,
            'following' => $following,
            'topCommunities' => $topCommunities,
            'searchTerm' => $request->input('search'),
            'sortOptions' => $sortOptions,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection,
        ]);
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_input' => 'image|mimes:jpeg,png,jpg',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
            $extension = $uploadedFile->getClientOriginalExtension();
            $filePath = $uploadedFile->storeAs('public/images/posts', $uniqueID . '.' . $extension);
            $post->ImagePath = 'storage/images/posts/' . $uniqueID . '.' . $extension;
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
        $saved = SavedPostsModel::where('user_id', $userId)->where('post_id', $id)->first();
        $commentCount = Comment::where('commentable_id', $id)->count();
        $following = FollowedCommunityModel::where('CommunityId', $post->InCommunity->CommunityId)->where('user_id', $userId)->first();
        $topCommunities = CommunitiesModel::orderByDesc('FollowerCount')->limit(8)->get();

        return view('posts', compact('post', 'upvoted', 'saved', 'commentCount', 'following', 'topCommunities'));
    }

    public function followCommunity($communityId){
        
        if(Auth::check()){
            $follow = new FollowedCommunityModel();
            // dd($communityId);
    
            $follow->user_id = auth()->user()->id;
            $follow->CommunityId = $communityId;
    
            CommunitiesModel::where('CommunityId', $communityId)->increment('FollowerCount');
            $follow->save();
    
            return redirect()->route('communityPage', ['communityId'=>$communityId]);
        }
        else{
            return view('login');
        }
    }

    public function unfollowCommunity($communityId){

        if(Auth::check()){
            $userId = auth()->user()->id;
    
            // Find and delete the record with the given user and community IDs
            FollowedCommunityModel::where('user_id', $userId)
            ->where('CommunityId', $communityId)
            ->delete();
    
            CommunitiesModel::where('CommunityId', $communityId)->decrement('FollowerCount');
    
            return redirect()->route('communityPage', ['communityId'=>$communityId]);
        }
        else{
            return view('login');
        }
    }

    public function upvotePost($postId){
        if(Auth::check()){
            $follow = new UserUpvotesModel();
            // dd($communityId);
    
            $follow->user_id = auth()->user()->id;
            $follow->post_id = $postId;
    
            PostModel::where('id', $postId)->increment('UpvoteCount');
            $follow->save();
    
            return redirect()->route('postPage', ['postId'=>$postId]);
        }
        else{
            return view('login');
        }
    }

    public function downvotePost($postId){

        if(Auth::check()){
            $userId = auth()->user()->id;
    
            UserUpvotesModel::where('user_id', $userId)
            ->where('post_id', $postId)
            ->delete();
    
            PostModel::where('id', $postId)->decrement('UpvoteCount');
    
            return redirect()->route('postPage', ['postId'=>$postId]);
        }
        else{
            return view('login');
        }
    }

    public function savePost($postId){
        if(Auth::check()){
            $save = new SavedPostsModel();
            // dd($communityId);
    
            $save->user_id = auth()->user()->id;
            $save->post_id = $postId;
    
            $save->save();
    
            return redirect()->route('postPage', ['postId'=>$postId]);
        }
        else{
            return view('login');
        }
    }

    public function unsavePost($postId){
        if(Auth::check()){
            $userId = auth()->user()->id;
    
            SavedPostsModel::where('user_id', $userId)
            ->where('post_id', $postId)
            ->delete();
        
            return redirect()->route('postPage', ['postId'=>$postId]);
        }
        else{
            return view('login');
        }
    }
}
