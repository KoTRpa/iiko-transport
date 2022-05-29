<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Create\Address;
use KMA\IikoTransport\Entities\Deliveries\Create\DeliveryPoint;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\DeliveryPoint
 */
class DeliveryPointTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
