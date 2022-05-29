<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Address;
use KMA\IikoTransport\Entities\Deliveries\Create\Street;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Address
 */
class AddressTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'order.deliveryPoint.address'
    ];
    protected string $entityClass = Address::class;
    protected array $fields = [
        'street',
        'index',
        'house',
        'building',
        'flat',
        'entrance',
        'floor',
        'doorphone',
        'regionId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            Street::class,
            $entity->street
        );
        $this->assertIsString($entity->index);
        $this->assertIsString($entity->house);
        $this->assertIsString($entity->building);
        $this->assertIsString($entity->flat);
        $this->assertIsString($entity->entrance);
        $this->assertIsString($entity->floor);
        $this->assertIsString($entity->doorphone);
        $this->assertIsUuid($entity->regionId);
    }
}
