<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Deleted;

use KMA\IikoTransport\Tests\EntityTestCase;

class RemovalTypeTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/RemovalType.json';
    protected string $entityClass = \KMA\IIkoTransport\Entities\Delivery\Response\Order\Deleted\RemovalType::class;
    protected array $fields = [
        'id',
        'name',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
    }
}
