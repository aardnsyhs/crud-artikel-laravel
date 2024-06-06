<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::create([
            'category_name' => 'Teknologi'
        ]);
        Category::create([
            'category_name' => 'Sosial'
        ]);
        Category::create([
            'category_name' => 'Edukasi'
        ]);
        Category::create([
            'category_name' => 'Budaya'
        ]);
        // User::factory(30)->create();
    }
}
