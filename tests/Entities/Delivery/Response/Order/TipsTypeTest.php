<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class TipsTypeTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/TipsType.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\TipsType::class;
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
