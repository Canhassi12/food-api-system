<?php

namespace Tests\Unit\Product\Application;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Mockery as m;
use Mockery\MockInterface;
use Tests\TestCase;
use Truckpag\Application\Controllers\Product\GetProducts;
use Truckpag\Domain\Repositories\ProductRepository;

class GetProductsPaginatedTest extends TestCase
{
    private MockInterface $productRepositoryStub;

    private MockInterface $lengthPaginator;

    public function setUp(): void
    {
        parent::setUp();
        $this->productRepositoryStub = m::mock(ProductRepository::class);
        $this->lengthPaginator = m::mock(LengthAwarePaginator::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        m::mock();
    }

    public function testGetPaginatedProductsSuccess(): void
    {
        $this->productRepositoryStub
            ->shouldReceive('paginate')
            ->once()
            ->andReturn($this->lengthPaginator);

        $test = new GetProducts($this->productRepositoryStub);

        $test->getProductsPaginated();
    }
}
