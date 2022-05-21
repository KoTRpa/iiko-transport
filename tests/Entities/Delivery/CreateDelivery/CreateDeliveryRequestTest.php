<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class CreateDeliveryRequestTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CreateDeliveryRequest.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest::class;
    protected array $fields = [
        'organizationId',
        'terminalGroupId',
        'createOrderSettings',
        'order',
    ];


    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest::fromJson
     */
    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->organizationId);

        $this->assertIsString($entity->terminalGroupId);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings::class,
            $entity->createOrderSettings
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order::class,
            $entity->order
        );
    }
}
