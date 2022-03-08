<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //тестовый токен
        DB::table('users')->insert([
            'name' => 'Test',
            //  'email' => Str::random(10) . '@gmail.com',
            'email' => 'Max@gmail.com',
            'password' => Hash::make('1234567800'),
        ]);
        DB::table('personal_access_tokens')->insert([
            'id' => 1,
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => 1,
            'name' => 'LaravelSanctumAuth',
            'token' => 'e65c3a36321f2a50f6e2d43ac29d621ea7b4757ba971053fb2d0b86163da4d02',
            'abilities' => '["*"]',
        ]);
        \App\Models\User::factory(15)->create();
    }
}
