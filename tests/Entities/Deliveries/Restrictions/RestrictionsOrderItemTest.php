<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItem;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItemModifier;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItem
 */
class RestrictionsOrderItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsRequest',
        'path' => 'orderItems'
    ];
    protected string $entityClass = RestrictionsOrderItem::class;
    protected array $fields = [
        'id',
        'product',
        'amount',
        'modifiers',
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
        $this->assertInstanceOf(Collection::class, $entity->modifiers);
        $entity->modifiers->each(
            fn (mixed $item) => $this->assertInstanceOf(RestrictionsOrderItemModifier::class, $item)
        );
    }
}
