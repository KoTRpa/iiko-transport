<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class ConceptionTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Conception.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Conception::class;
    protected array $fields = [
        'id',
        'name',
        'code',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->code);
    }
}
