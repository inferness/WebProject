<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for ($i=0;$i<10;$i++) {
            $uniqueNumber = $faker->unique()->numberBetween(1,9999);
            $formatNumber = sprintf('%04d', $uniqueNumber);
            $uniqueID = 'CO' . $formatNumber;

            DB::table('communities')->insert([
                'CommunityId' => $uniqueID,
                'Name' => $faker->words(1, true),
                'Description' => $faker->paragraph,
                'Owner' => $faker->userName,
            ]);
        }
    }
}
