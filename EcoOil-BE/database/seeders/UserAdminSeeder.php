<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;  
use Illuminate\Support\Facades\Hash;  

class UserAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(env('APP_ADMIN_PASS', 'password')),
            'tipo' => 'admin',
        ]);

        User::create([
            'name' => 'Estabelecimento Teste',
            'email' => 'estabelecimento@teste.com',
            'password' => Hash::make('password'),
            'tipo' => 'estabelecimento',
        ]);

        User::create([
            'name' => 'Transportador Teste',
            'email' => 'transportador@teste.com',
            'password' => Hash::make('password'),
            'tipo' => 'transportador',
        ]);

        User::factory(2)->create(['tipo' => 'estabelecimento']);
        User::factory(2)->create(['tipo' => 'transportador']);
    }
}
