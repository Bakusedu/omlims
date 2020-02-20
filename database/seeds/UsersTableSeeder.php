<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
            'name' => 'Blessing Anaruwe',
            'email' => 'blessing@gmail.com',
            'password' => Hash::make('Adizue1990')
        ]);
    }
}
