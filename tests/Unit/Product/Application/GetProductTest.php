<?php

namespace Tests\Unit\Product\Application;

use Mockery as m;
use Mockery\MockInterface;
use Tests\TestCase;
use Tests\Unit\Product\ProductProviderTrait;
use Truckpag\Application\Controllers\Product\GetProduct;
use Truckpag\Domain\Entities\ProductEntity;
use Truckpag\Domain\Repositories\ProductRepository;

class GetProductTest extends TestCase
{
    use ProductProviderTrait;
    private MockInterface $productRepositoryStub;

    private ProductEntity $productEntity;

    public function setUp(): void
    {
        parent::setUp();
        $this->productRepositoryStub = m::mock(ProductRepository::class);
        $this->productEntity = $this->validProductEntity();

    }

    public function tearDown(): void
    {
        parent::tearDown();
        m::mock();
    }

    public function testGetProductSuccess(): void
    {
        $this->productRepositoryStub
            ->shouldReceive('getProductByCode')
            ->with($this->productEntity->code)
            ->once()
            ->andReturn($this->productEntity);

        $test = new GetProduct($this->productRepositoryStub);

        $test->getProductByCode($this->productEntity->code);
    }
}
