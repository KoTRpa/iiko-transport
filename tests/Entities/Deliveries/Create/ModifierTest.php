<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Modifier;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Modifier
 */
class ModifierTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'order.items.modifiers'
    ];
    protected string $entityClass = Modifier::class;
    protected array $fields = [
        'productId',
        'amount',
        'productGroupId',
        'price',
        'positionId',
    ];

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
