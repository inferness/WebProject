<?php

namespace Database\Seeders;

use App\Models\CommunitiesModel;
use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class demoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        
        for($i=0;$i<5;$i++){
            DB::table('Users')->insert([
                'name'=>$faker->name(),
                'username'=>$faker->userName(),
                'email'=>$faker->email(),
                'description'=>$faker->sentence(),
                'password'=>Hash::make('admin123'),
                'dateOfBirth'=>$faker->date()
            ]);
        }

        $userId = UserModel::pluck('id')->toArray();

        $imagePaths = ['seederBanner1.jpg', 'seederBanner2.jpg'];
        for($i=0;$i<10;$i++){
            $uniqueNumber = $faker->unique()->numberBetween(1,9999);
            $formatNumber = sprintf('%04d', $uniqueNumber);
            $uniqueID = 'CO' . $formatNumber;
            DB::table('Communities')->insert([
                'CommunityId'=>$uniqueID,
                'Name'=>$faker->word(),
                'Description'=>$faker->paragraph(),
                'Owner'=>$faker->randomElement($userId),
                'FollowerCount'=>$faker->numberBetween(1,100),
                'BannerPath'=> 'images/default/' . $faker->randomElement($imagePaths),
            ]);
        }


        $communityId = CommunitiesModel::pluck('CommunityId')->toArray();
        $postImagePath = [null, 'images/default/SeederImage.jpg'];
        for($i=0;$i<20;$i++){
            DB::table('Posts')->insert([
                'CommunityId'=>$faker->randomElement($communityId),
                'Title'=>$faker->sentence(),
                'Description'=>$faker->paragraph(),
                'UpvoteCount'=>$faker->numberBetween(1,100),
                'UserId'=>$faker->randomElement($userId),
                'ImagePath'=>$faker->randomElement($postImagePath),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
