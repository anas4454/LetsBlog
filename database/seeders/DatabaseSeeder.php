<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('password'),
        ]);


            Blog::factory(10)->create();
            Writer::factory(5)->create();

            $this->call(FavouriteSeeder::class);

    }


}
