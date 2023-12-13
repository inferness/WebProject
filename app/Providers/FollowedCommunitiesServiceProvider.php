<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\FollowedCommunityModel;
use Illuminate\Support\Facades\Auth;
use App\Models\CommunitiesModel;

class FollowedCommunitiesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('layout', function ($view) {
            // Check if the user is authenticated
            if (Auth::check()) {
                // User is authenticated, fetch the followed communities
                $UserId = Auth::user()->id;
                // dd($UserId);
                $followedCommunities = FollowedCommunityModel::where('user_id', $UserId)->get();
                
                $ownedCommunities = CommunitiesModel::where('Owner', $UserId)->get();
            } else {
                // User is not authenticated, provide an empty list
                $followedCommunities = collect();
                $ownedCommunities = collect(); // An empty collection
            }

            // Share the followed communities with the sidebar view
            $view->with('followedCommunities', $followedCommunities);
            $view->with('ownedCommunities', $ownedCommunities);
        });
    }
}
