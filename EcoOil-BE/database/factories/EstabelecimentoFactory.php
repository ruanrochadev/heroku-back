<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estabelecimento>
 */
class EstabelecimentoFactory extends Factory
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
            'nome' => $this->faker->company(),
            'endereco' => $this->faker->address(),
            'telefone' => $this->faker->phoneNumber(),
            "cnpj" => fake()->cnpj(),
        ];
    }
}
