<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("12345678");
        $user->role = \App\RoleConstant::ADMIN;
        $user->save();

        $user = new User();
        $user->name = "guest";
        $user->email = "guest@gmail.com";
        $user->password = Hash::make("12345678");
        $user->role = \App\RoleConstant::GUEST;
        $user->save();
    }
}
