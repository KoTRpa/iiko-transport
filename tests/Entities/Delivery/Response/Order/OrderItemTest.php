<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderItemTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/OrderItem.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItem::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Product::class,
            $entity->product
        );

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->modifiers
        );
        $entity->modifiers->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItemModifier::class,
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted::class,
            $entity->deleted
        );

        $this->assertIsFloat($entity->amount);

        $this->assertIsString($entity->comment);

        $this->assertIsDateTimeString($entity->whenPrinted);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Size::class,
            $entity->size
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\ComboInformation::class,
            $entity->comboInformation
        );
    }
}
