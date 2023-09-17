<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryAddress;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryAddress
 */
class DeliveryAddressTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsRequest',
        'path' => 'deliveryAddress'
    ];
    protected string $entityClass = DeliveryAddress::class;
    protected array $fields = [
        'city',
        'streetName',
        'streetId',
        'house',
        'building',
        'index',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->city);
        $this->assertIsString($entity->streetName);
        $this->assertIsString($entity->streetId);
        $this->assertIsString($entity->house);
        $this->assertIsString($entity->building);
        $this->assertIsString($entity->index);
    }
}
