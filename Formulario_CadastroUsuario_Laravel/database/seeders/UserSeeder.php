<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Selma',
            'last_name' => 'Teste',
            'username' => 'selma',
            'email' => 'selma@teste.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
