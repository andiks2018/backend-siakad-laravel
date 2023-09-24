<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create(); //generate otomatis

        User::create([ //yang ini kita buat manual
            'name'=>'andi',
            'email'=>'andi@andi.com',
            'email_verified_at' =>now(),
            'password'=>Hash::make('123456'),
        ]);

    }
}
