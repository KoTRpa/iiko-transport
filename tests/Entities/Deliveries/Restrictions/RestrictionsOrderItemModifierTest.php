<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItemModifier;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItemModifier
 */
class RestrictionsOrderItemModifierTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsRequest',
        'path' => 'orderItems.modifiers'
    ];
    protected string $entityClass = RestrictionsOrderItemModifier::class;
    protected array $fields = [
        'id',
        'product',
        'amount',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->product);
        $this->assertIsFloat($entity->amount);
    }
}
