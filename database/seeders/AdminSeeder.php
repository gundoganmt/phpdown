<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "full_name" => "John Doe", 
            "email" => "admin@gmail.com", 
            "password" => bcrypt("123456"), 
            "username" => "admin",
            "profile_pic" => 'profile.png'
        ]);
    }
}
