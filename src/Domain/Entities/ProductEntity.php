<?php

namespace Truckpag\Domain\Entities;

use DateTime;

class ProductEntity
{
    public function __construct(
        public readonly int $id,
        public readonly int $code,
        public readonly string $status,
        public readonly string $importedAt,
        public readonly string $url,
        public readonly string $creator,
        public readonly string $createdAt,
        public readonly string $lastModifiedAt,
        public readonly string $productName,
        public readonly string $quantity,
        public readonly string $brands,
        public readonly string $categories,
        public readonly string $labels,
        public readonly ?string $cities,
        public readonly string $purchasePlaces,
        public readonly string $stores,
        public readonly string $ingredientsText,
        public readonly string $traces,
        public readonly string $servingSize,
        public readonly float $servingQuantity,
        public readonly int $nutriscoreScore,
        public readonly string $nutriscoreGrade,
        public readonly string $mainCategory,
        public readonly string $imageUrl,
    ) {
    }

    public static function make(array $payload): self
    {
        return new self(
            id: $payload['id'],
            code: $payload['code'],
            status: $payload['status'],
            importedAt: $payload['imported_t'],
            url: $payload['url'],
            creator: $payload['creator'],
            createdAt: $payload['created_t'],
            lastModifiedAt: $payload['last_modified_t'],
            productName: $payload['product_name'],
            quantity: $payload['quantity'],
            brands: $payload['brands'],
            categories: $payload['categories'],
            labels: $payload['labels'],
            cities: $payload['cities'],
            purchasePlaces: $payload['purchase_places'],
            stores: $payload['stores'],
            ingredientsText: $payload['ingredients_text'],
            traces: $payload['traces'],
            servingSize: $payload['serving_size'],
            servingQuantity: $payload['serving_quantity'],
            nutriscoreScore: $payload['nutriscore_score'],
            nutriscoreGrade: $payload['nutriscore_grade'],
            mainCategory: $payload['main_category'],
            imageUrl: $payload['image_url'],
        );
    }
}
