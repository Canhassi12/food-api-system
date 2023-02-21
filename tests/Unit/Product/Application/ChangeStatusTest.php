<?php

namespace Tests\Unit\Product\Application;

use Mockery\MockInterface;
use Tests\TestCase;
use Mockery as m;
use Truckpag\Application\Controllers\Product\ChangeStatus;
use Truckpag\Domain\Repositories\ProductRepository;

class ChangeStatusTest extends TestCase
{
    private MockInterface $productRepositoryStub;


    public function setUp(): void
    {
        parent::setUp();
        $this->productRepositoryStub = m::mock(ProductRepository::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        m::mock();
    }

    public function testChangeStatusToTrashOfProject(): void
    {
        $this->productRepositoryStub
            ->shouldReceive('changeStatusToTrash')
            ->with(1212)
            ->once();


        $test = new ChangeStatus($this->productRepositoryStub);

        $test->toTrash(1212);
    }
}
