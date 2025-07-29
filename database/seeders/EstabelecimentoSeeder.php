<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estabelecimento;
use App\Models\User;

class EstabelecimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)
            ->create()
            ->each(function ($user) {
                Estabelecimento::factory()->create(['user_id' => $user->id]);
            });
    }
}
