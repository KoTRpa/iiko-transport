<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class ProductGroupTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/ProductGroup.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\ProductGroup::class;
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
