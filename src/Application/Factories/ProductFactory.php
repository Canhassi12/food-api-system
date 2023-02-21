<?php

namespace Truckpag\Application\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Truckpag\Infrastructure\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomNumber(4),
            'status' => 'draft',
            'imported_t' => "2020-02-07T16:00:00Z",
            'url' => $this->faker->url(),
            'creator' => $this->faker->name(),
            'created_t' =>  $this->faker->dateTimeBetween('-1 hour'),
            'last_modified_t' =>  $this->faker->dateTimeBetween('+1 hour', '+2 hour'),
            'product_name' => $this->faker->name(),
            'quantity' =>  "380 g (6 x 2 u.)",
            'brands' => "La Cestera",
            'categories' => "Lanches comida, Lanches doces, Biscoitos e Bolos, Bolos, Madalenas",
            'labels' => "Contem gluten, Contém derivados de ovos, Contém ovos",
            'cities' => $this->faker->city(),
            'purchase_places' => $this->faker->country(),
            'stores' => "Lidl",
            'ingredients_text' => $this->faker->text(),
            'traces' => "Frutos de casca rija,Leite,Soja,Sementes de sésamo,Produtos à base de sementes de sésamo",
            'serving_size' => "madalena 31.7 g",
            'serving_quantity' => 31.7,
            'nutriscore_score' => $this->faker->randomNumber(2),
            'nutriscore_grade' => "d",
            'main_category' =>  "en:madeleines",
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
