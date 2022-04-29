<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class StreetTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Street.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Street::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\City::class,
            $entity->city
        );
    }
}
