<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class DeliveryPointTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/DeliveryPoint.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\DeliveryPoint::class;
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
            \KMA\IikoTransport\Entities\Coordinates::class,
            $entity->coordinates
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Address::class,
            $entity->address
        );

        $this->assertIsString($entity->externalCartographyId);
        $this->assertIsString($entity->comment);
    }
}
