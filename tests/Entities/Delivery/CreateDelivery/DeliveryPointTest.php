<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\DeliveryPoint;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\DeliveryPoint
 */
class DeliveryPointTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.deliveryPoint'
    ];
    protected string $entityClass = DeliveryPoint::class;
    protected array $fields = [
        'coordinates',
        'address',
        'externalCartographyId',
        'comment',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Common\Coordinates::class,
            $entity->coordinates
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Address::class,
            $entity->address
        );

        $this->assertIsString($entity->externalCartographyId);
        $this->assertIsString($entity->comment);
    }
}
