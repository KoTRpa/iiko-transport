<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class MarketingSourceTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/MarketingSource.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\MarketingSource::class;
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
