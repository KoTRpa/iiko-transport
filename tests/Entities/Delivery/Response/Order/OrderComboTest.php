<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderComboTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/OrderCombo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderCombo::class;
    protected array $fields = [
        'id',
        'name',
        'amount',
        'price',
        'sourceId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);

        $this->assertIsString($entity->name);

        $this->assertIsInt($entity->amount);

        $this->assertIsFloat($entity->price);

        $this->assertIsUuid($entity->sourceId);
    }
}
