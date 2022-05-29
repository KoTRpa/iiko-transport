<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\ComboInformation;
use KMA\IikoTransport\Entities\Deliveries\Create\Modifier;
use KMA\IikoTransport\Entities\Deliveries\Create\OrderItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\OrderItem
 */
class OrderItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'order.items'
    ];
    protected string $entityClass = OrderItem::class;
    protected array $fields = [
        'productId',
        'modifiers',
        'price',
        'positionId',
        'type',
        'amount',
        'productSizeId',
        'comboInformation',
        'comment',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->productId);
        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->modifiers
        );
        $entity->modifiers->each(function ($item) {
            $this->assertInstanceOf(
                Modifier::class,
                $item
            );
        });
        $this->assertIsFloat($entity->price);
        $this->assertIsUuid($entity->positionId);
        $this->assertIsString($entity->type);
        $this->assertContains($entity->type, ['Product', 'Compound']);
        $this->assertIsFloat($entity->amount);
        $this->assertIsUuid($entity->productSizeId);
        $this->assertInstanceOf(
            ComboInformation::class,
            $entity->comboInformation
        );
        $this->assertIsString($entity->comment);
    }
}
