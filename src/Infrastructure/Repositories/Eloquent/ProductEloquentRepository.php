<?php

namespace Truckpag\Infrastructure\Repositories\Eloquent;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Truckpag\Domain\Entities\ProductEntity;
use Truckpag\Domain\Repositories\ProductRepository;
use Truckpag\Infrastructure\Models\Product;

class ProductEloquentRepository implements ProductRepository
{
    public function paginate(int $perPage = 100): LengthAwarePaginator
    {
        return Product::query()->paginate($perPage);
    }

    public function getProductByCode(int $code): ProductEntity
    {
        $model = Product::query()->where('code', $code)->first();

        return ProductEntity::make($model->toArray());
    }

    public function changeStatusToTrash(int $code): void
    {
        Product::query()->where('code', $code)->update(["status" => "trash"]);
    }

    public function updateProductByCode(int $code, array $product): ProductEntity
    {
        Product::query()->where('code', $code)->update($product);

        return $this->getProductByCode($code);
    }
}
