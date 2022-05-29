<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Address;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\DeliveryPoint;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\DeliveryPoint
 */
class DeliveryPointTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
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
            Coordinates::class,
            $entity->coordinates
        );

        $this->assertInstanceOf(
            Address::class,
            $entity->address
        );

        $this->assertIsString($entity->externalCartographyId);
        $this->assertIsString($entity->comment);
    }
}
