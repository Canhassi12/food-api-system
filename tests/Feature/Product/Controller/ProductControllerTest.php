<?php

namespace Tests\Feature\Product\Controller;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Truckpag\Infrastructure\Models\Product;

class ProductControllerTest extends TestCase
{
    private Model $product;
    public function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create();
    }

    public function testGetProductsPaginatedSuccess(): void
    {
        for ($i = 0; $i <= 20; $i++) {
            Product::factory()->create();
        }

        $response = $this->get(route('getProducts'));

        $response->assertStatus(200);
        $response->assertSee([]);
    }

    public function testGetProductsByCodeSuccess(): void
    {
        $response = $this->get(route('getProduct', $this->product->code));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'status',
            'importedAt',
            'url',
            'creator',
            'createdAt',
            'lastModifiedAt',
            'productName',
            'quantity',
            'brands',
            'categories',
            'labels',
            'cities',
            'purchasePlaces',
            'stores',
            'ingredientsText',
            'traces',
            'servingSize',
            'servingQuantity',
            'nutriscoreScore',
            'nutriscoreGrade',
            'mainCategory',
            'imageUrl'
        ]);
    }

    public function testChangeProductStatus(): void
    {
        $response = $this->delete(route('changeStatus', $this->product->code));

        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDatabaseHas('products', ['status' => 'trash']);
    }

    public function testUpdateProductSuccess(): void
    {
        $response = $this->put(route('updateProduct', $this->product->code), [
            'url' => "https://canhassi.tech",
            "brands" => "BMW"
        ]);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDatabaseHas('products', ['url' => "https://canhassi.tech", "brands" => "BMW"]);
    }
}
