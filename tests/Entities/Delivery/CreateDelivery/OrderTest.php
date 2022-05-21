<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Order.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order::class;
    protected array $fields = [
        'id',
        'completeBefore',
        'phone',
        'orderTypeId',
        'orderServiceType',
        'deliveryPoint',
        'comment',
        'customer',
        'guests',
        'marketingSourceId',
        'operatorId',
        'items',
        'combos',
        'payments',
        'tips',
        'sourceKey',
        'discountsInfo',
        'iikoCard5Info',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order::fromJson
     */
    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);

        $this->assertIsString($entity->completeBefore);

        $this->assertIsString($entity->phone);

        $this->assertIsUuid($entity->orderTypeId);

        $this->assertIsString($entity->orderServiceType);
        $this->assertContains($entity->orderServiceType, ['DeliveryByCourier', 'DeliveryByClient']);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\DeliveryPoint::class,
            $entity->deliveryPoint
        );

        $this->assertIsString($entity->comment);


        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Customer::class,
            $entity->customer
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Guests::class,
            $entity->guests
        );

        $this->assertIsUuid($entity->marketingSourceId);

        $this->assertIsUuid($entity->operatorId);

        // items
        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->items
        );
        $entity->items->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\CreateDelivery\OrderItem::class,
                $item
            );
        });

        // combos
        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->combos
        );
        $entity->combos->each(function ($combo) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Combo::class,
                $combo
            );
        });

        // payments
        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->payments
        );
        $entity->payments->each(function ($payment) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment::class,
                $payment
            );
        });

        // tips
        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->tips
        );
        $entity->tips->each(function ($tip) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\CreateDelivery\TipsPayment::class,
                $tip
            );
        });

        $this->assertIsString($entity->sourceKey);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\DiscountsInfo::class,
            $entity->discountsInfo
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\IikoCard5Info::class,
            $entity->iikoCard5Info
        );
    }
}
