<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryResponse;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryResponse
 */
class CreateDeliveryResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryResponse'
    ];
    protected string $entityClass = CreateDeliveryResponse::class;
    protected array $fields = [
        'correlationId',
        'orderInfo',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\OrderInfo::class,
            $entity->orderInfo
        );
    }
}
