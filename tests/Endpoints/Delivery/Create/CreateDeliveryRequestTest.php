<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Create;

use KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryRequest;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryRequest
 */
class CreateDeliveryRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest'
    ];
    protected string $entityClass = CreateDeliveryRequest::class;
    protected array $fields = [
        'organizationId',
        'terminalGroupId',
        'createOrderSettings',
        'order',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->organizationId);

        $this->assertIsString($entity->terminalGroupId);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Deliveries\Create\CreateOrderSettings::class,
            $entity->createOrderSettings
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Deliveries\Create\Order::class,
            $entity->order
        );
    }
}
