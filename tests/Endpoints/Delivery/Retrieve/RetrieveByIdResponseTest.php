<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Retrieve;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdResponse;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdResponse
 */
class RetrieveByIdResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RetrieveDeliveryByIdResponse'
    ];
    protected string $entityClass = RetrieveDeliveryByIdResponse::class;
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
