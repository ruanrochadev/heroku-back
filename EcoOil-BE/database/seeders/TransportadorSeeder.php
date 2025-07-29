<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportador;
use App\Models\User;

class TransportadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(3)
            ->state(['tipo' => 'transportador'])
            ->create()
            ->each(function ($user) {
                Transportador::factory()->create(['user_id' => $user->id]);
            });
    }
}
