<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Retrieve;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Delivery\Response\OrderInfo;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdResponse;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdResponse
 */
class RetrieveByIdResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/RetrieveByIdResponse'
    ];
    protected string $entityClass = RetrieveByIdResponse::class;
    protected array $fields = [
        'correlationId',
        'orders',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->orders);
        $entity->orders->each(function ($item) {
            $this->assertInstanceOf(OrderInfo::class, $item);
        });
    }
}
