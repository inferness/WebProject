<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowedCommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = DB::table('User')->pluck('UserId')->toArray(); 
        $communities = DB::table('Communities')->pluck('CommunityId')->toArray();

        foreach ($users as $userId) {
            // Randomly select a few communities for each user
            $followedCommunities = array_rand($communities, rand(1, count($communities)));

            foreach ((array) $followedCommunities as $index) {
                DB::table('FollowedCommunity')->insert([
                    'UserId' => $userId,
                    'CommunityId' => $communities[$index],
                ]);
            }
        }
    }
}
