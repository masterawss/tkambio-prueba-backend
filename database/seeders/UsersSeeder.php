<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'       => 'Anthony Will Solsol Soplin',
            'email'      => 'admin@gmail.com',
            'birth_date' => '1996-07-28',
            'password'   => Hash::make('admin12345'),
        ]);
        User::factory()->count(1000)->create();
    }
}
