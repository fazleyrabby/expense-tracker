<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'username' => 'test',
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('123456')
        ]);

        Category::create([
            'name' => 'Salary',
            'type' => 'income',
            'user_id' => $user->id
        ]);

        Category::create([
            'name' => 'Freelance Work',
            'type' => 'income',
            'user_id' => $user->id
        ]);

        Category::create([
            'name' => 'Tech',
            'type' => 'expense',
            'user_id' => $user->id
        ]);

        Category::create([
            'name' => 'Books',
            'type' => 'expense',
            'user_id' => $user->id
        ]);

        Category::create([
            'name' => 'Others',
            'type' => 'expense',
            'user_id' => $user->id
        ]);

        Category::create([
            'name' => 'Foods',
            'type' => 'expense',
            'user_id' => $user->id
        ]);

        Category::create([
            'name' => 'Dress',
            'type' => 'expense',
            'user_id' => $user->id
        ]);
        
    }
}
