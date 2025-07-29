<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportador>
 */
class TransportadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nome_motorista' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'cnpj' => $this->faker->numerify('##.###.###/0001-##'),
        ];
    }
}
