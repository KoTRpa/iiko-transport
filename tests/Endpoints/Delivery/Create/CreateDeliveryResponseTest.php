<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Create;

use KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryResponse;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryResponse
 */
class CreateDeliveryResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryResponse'
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
            OrderInfo::class,
            $entity->orderInfo
        );
    }
}
