<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\Street;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Street
 */
class StreetTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.deliveryPoint.address.street'
    ];
    protected string $entityClass = Street::class;
    protected array $fields = [
        'classifierId',
        'id',
        'name',
        'city',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->classifierId);
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->city);
    }
}
