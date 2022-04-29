<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class ComboTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Combo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Combo::class;
    protected array $fields = [
        'id',
        'name',
        'amount',
        'price',
        'sourceId',
        'programId',
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

        $this->assertIsUuid($entity->programId);
    }
}
