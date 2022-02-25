<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->roleadmin = 1;
        $user->firstname = "admin";
        $user->lastname = "admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt("12345");
        $user->save();

    }
}
