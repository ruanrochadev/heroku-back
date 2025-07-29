<?php

namespace Database\Factories;

use App\Models\Estabelecimento;
use App\Models\Transportador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coleta>
 */
class ColetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estabelecimento_id' => Estabelecimento::factory(),
            'transportador_id' => $this->faker->boolean(30) ? Transportador::factory() : null,
            'quantidade_oleo' => $this->faker->randomFloat(2, 5, 50),
            'qualidade_oleo' => $this->faker->randomElement(['excelente', 'boa', 'regular', 'ruim']),
            'dia_semana' => $this->faker->randomElement(['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo']),
            'status' => $this->faker->randomElement(['disponivel', 'aceita', 'coletada']),
            'endereco' => $this->faker->address,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
