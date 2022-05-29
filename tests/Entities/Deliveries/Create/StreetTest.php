<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Street;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Street
 */
class StreetTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
