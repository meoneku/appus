<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Start Data Sample For Users
        User::create([
            'name'      => 'admin',
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'role'      => 'Admin'
        ]);
        User::create([
            'name'      => 'pustaka',
            'username'  => 'pustaka',
            'password'  => bcrypt('pustaka'),
            'role'      => 'Pustaka'
        ]);
        //End Data Sample For Users
    }
}