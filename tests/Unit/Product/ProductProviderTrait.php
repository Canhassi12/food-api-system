<?php

namespace Tests\Unit\Product;

use Truckpag\Domain\Entities\ProductEntity;

trait ProductProviderTrait
{
    public function validProductPayload(array $fields = []): array
    {
        return [
            "id" => 12,
            "code" => 1028,
            "status" => "draft",
            "imported_t" => "2020-02-07T16:00:00Z",
            "url" => "http://www.swaniawski.com/",
            "creator" => "Caleb King",
            "created_t" => 1415302075,
            "last_modified_t" => 1415302075,
            "product_name" => "Dr. Kattie Botsford IV",
            "quantity" => "380 g (6 x 2 u.)",
            "brands" => "La Cestera",
            "categories" => "Lanches comida, Lanches doces, Biscoitos e Bolos, Bolos, Madalenas",
            "labels" => "Contem gluten, Contém derivados de ovos, Contém ovos",
            "cities" => "Reinatown",
            "purchase_places" => "Ethiopia",
            "stores" => "Lidl",
            "ingredients_text" => "Esse vitae rerum ipsum. Quaerat animi eveniet qui aut.",
            "traces" => "Frutos de casca rija,Leite,Soja,Sementes de sésamo,Produtos à base de sementes de sésamo",
            "serving_size" => "madalena 31.7 g",
            "serving_quantity" => 207821.9,
            "nutriscore_score" => 41,
            "nutriscore_grade" => "d",
            "main_category" => "en:madeleines",
            "image_url" => "https://via.placeholder.com/640x480.png/002266?text=vel",
            ...$fields,
        ];
    }

    public function validProductEntity(): ProductEntity
    {
        return ProductEntity::make($this->validProductPayload());
    }
}
