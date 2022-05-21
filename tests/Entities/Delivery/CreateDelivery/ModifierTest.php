<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class ModifierTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Modifier.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Modifier::class;
    protected array $fields = [
        'productId',
        'amount',
        'productGroupId',
        'price',
        'positionId',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Modifier::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Modifier::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Modifier::fromJson
     */
    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->productId);
        $this->assertIsFloat($entity->amount);
        $this->assertIsUuid($entity->productGroupId);
        $this->assertIsFloat($entity->price);
        $this->assertIsUuid($entity->positionId);
    }
}
