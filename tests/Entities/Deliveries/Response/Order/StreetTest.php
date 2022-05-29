<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\City;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Street;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Street
 */
class StreetTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.deliveryPoint.address.street'
    ];
    protected string $entityClass = Street::class;
    protected array $fields = [
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
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertInstanceOf(
            City::class,
            $entity->city
        );
    }
}
