<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'lofike',
            'email' => 'm4rtin.t@gmail.com',
            'password' => '$2y$10$bmeekV4dbnP0lJR8LEeIX.Nk.TgSI0/pSVCUktovtrua.QO6vWdna',
            'remember_token' => NULL,
            'created_at' => '2016-12-21 09:27:20',
            'updated_at' => new DateTime()
        ]);
        DB::table('shows')->insert([
            'id' => 1,
            'title' => 'Video Title',
            'description' => "Long description of the video",
            'image_link' => "http://www.daisuki.net/content/dam/pim/daisuki/en/ONEPUNCHMAN/13161/movie.jpg",
            'video_link' => "http://www.daisuki.net/hk/en/anime/watch.ONEPUNCHMAN.13156.html"
        ]);
    }
}
