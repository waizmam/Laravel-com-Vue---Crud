<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Elom Waizmam',
            'email' => 'waizmam.rj@gmail.com',
            'password' => bcrypt('Debora0103')
        ]);
    }
}
