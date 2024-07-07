<?php

namespace seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userClass = config('laravel-pages.models.user');
        $userClass::create([
            'name' => 'Marc Guinea',
            'email' => env(''),
            'password' => MD5(env(''))
        ]);
    }
}
