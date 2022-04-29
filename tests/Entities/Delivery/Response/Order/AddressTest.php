<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class AddressTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Address.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Address::class;
    protected array $fields = [
        'street',
        'index',
        'house',
        'building',
        'flat',
        'entrance',
        'floor',
        'doorphone',
        'region',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Street::class,
            $entity->street
        );
        $this->assertIsString($entity->index);
        $this->assertIsString($entity->house);
        $this->assertIsString($entity->building);
        $this->assertIsString($entity->flat);
        $this->assertIsString($entity->entrance);
        $this->assertIsString($entity->floor);
        $this->assertIsString($entity->doorphone);
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Region::class,
            $entity->region
        );
    }
}
