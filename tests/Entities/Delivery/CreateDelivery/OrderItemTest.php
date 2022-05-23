<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\OrderItem;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\OrderItem
 */
class OrderItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
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
                \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Modifier::class,
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
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\ComboInformation::class,
            $entity->comboInformation
        );

        $this->assertIsString($entity->comment);
    }
}
