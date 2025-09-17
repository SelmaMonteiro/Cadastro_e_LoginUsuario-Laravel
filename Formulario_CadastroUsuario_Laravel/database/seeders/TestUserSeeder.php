<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Selma',
            'last_name' => 'Monteiro',
            'username' => 'selma',
            'email' => 'selma@teste.com',
            'password' => Hash::make('123456'),
        ]);
        
        echo "Usuário de teste criado:\n";
        echo "Username: selma\n";
        echo "Password: 123456\n";
    }
}