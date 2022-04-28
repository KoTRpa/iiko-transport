<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class CauseTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Cause.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Cause::class;
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
