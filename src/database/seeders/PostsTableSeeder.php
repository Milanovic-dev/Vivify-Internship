<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 1 ; $i <= 50 ; $i++) {
            DB::table('posts')
                ->insert([
                    'title' => $faker->title,
                    'content' => $faker->text,
                    'user_id' => 1
            ]);
        }
    }
}
