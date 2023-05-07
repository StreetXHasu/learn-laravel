<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // token 1|vWnsVUfV42XdAXrUWaJomtdCre6blsHLT5ST7b7x
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@test.com',
                'password' => '$2y$10$k2AGFMGebU0AZPuRsEIXx.F8/ca3dE3vl7IXrC9fVtZtCaS.Wkt7e',
                'is_admin' => true,
         ])->tokens()->create([
             'id' => 1,
             'name' => 'LaravelSanctumAuth',
             'token' => 'e42912e0af5c96554e20f17e7556104bf9240e832817a2ab12afd33133cc62af',
             'abilities' => ['*'],
         ]);

        // token 2|8couR0qdd7bNjn8fSAz8fJjCGZw4L18q0ULpyLlX
         \App\Models\User::factory()->create([
             'name' => 'User',
             'email' => 'user@test.com',
                'password' => '$2y$10$k2AGFMGebU0AZPuRsEIXx.F8/ca3dE3vl7IXrC9fVtZtCaS.Wkt7e',
         ])->tokens()->create([
             'id' => 2,
             'name' => 'LaravelSanctumAuth',
             'token' => '376d097eac399d1d7e9248f4b4d23dbff87f4fc8b543be9552a61a6fd61e2d0f',
             'abilities' => ['*'],
         ]);

         // insert in custom table directly table "personal_access_tokens"




    }
}
