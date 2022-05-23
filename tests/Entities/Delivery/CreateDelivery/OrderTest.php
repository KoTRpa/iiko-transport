<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order
 */
class OrderTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order'
    ];
    protected string $entityClass = Order::class;
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
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\DeliveryPoint::class,
            $entity->deliveryPoint
        );

        $this->assertIsString($entity->comment);


        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Customer::class,
            $entity->customer
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Guests::class,
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
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\IikoCard5Info::class,
            $entity->iikoCard5Info
        );
    }
}
