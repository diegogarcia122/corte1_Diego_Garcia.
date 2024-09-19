<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Computer::class;

    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numberBetween(1000000,9999999),
            'nombre' => $this->faker->randomElement(['JOSUE', 'MARIA', 'CAMILO', 'GABRIEL']),
            'descripcion' => $this->faker->randomElement(['ThinkPad', 'IdeaPad', 'Slim', 'Chunk']),
            'categoria' => $this->faker->randomElement(['calzado', 'ropa', 'joyería']),
            'precio' => $this->faker->numberBetween(100,9999),
            'stock' => $this->faker->numberBetween(1,999),
        ];
    }
}
