<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* File::makeDirectory('posts', 0711, true, true);  */
        Storage::deleteDirectory('public/posts',711, true, true); 
        Storage::makeDirectory('public/posts',711);
        /* \App\Models\User::factory(100)->create(); */
        \App\Models\Post::factory(10)->create();
    }
}
