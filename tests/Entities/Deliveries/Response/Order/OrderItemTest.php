<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\ComboInformation;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItemModifier;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItemProduct;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Size;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItem
 */
class OrderItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.items'
    ];
    protected string $entityClass = OrderItem::class;
    protected array $fields = [
        'product',
        'modifiers',
        'price',
        'cost',
        'pricePredefined',
        'positionId',
        'taxPercent',
        'type',
        'status',
        'deleted',
        'amount',
        'comment',
        'whenPrinted',
        'size',
        'comboInformation',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            OrderItemProduct::class,
            $entity->product
        );
        $this->assertInstanceOf(
            Collection::class,
            $entity->modifiers
        );
        $entity->modifiers->each(function ($item) {
            $this->assertInstanceOf(
                OrderItemModifier::class,
                $item
            );
        });
        $this->assertIsFloat($entity->price);
        $this->assertIsFloat($entity->cost);
        $this->assertIsBool($entity->pricePredefined);
        $this->assertIsUuid($entity->positionId);
        $this->assertIsFloat($entity->taxPercent);
        $this->assertIsString($entity->type);
        $this->assertContains($entity->type, ['Product', 'Compound']);
        $this->assertIsString($entity->status);
        $this->assertContains($entity->status, [
            'Added',
            'PrintedNotCooking',
            'CookingStarted',
            'CookingCompleted',
            'Served',
        ]);
        $this->assertInstanceOf(
            Deleted::class,
            $entity->deleted
        );
        $this->assertIsFloat($entity->amount);
        $this->assertIsString($entity->comment);
        $this->assertIsDateTimeString($entity->whenPrinted);
        $this->assertInstanceOf(
            Size::class,
            $entity->size
        );
        $this->assertInstanceOf(
            ComboInformation::class,
            $entity->comboInformation
        );
    }
}
