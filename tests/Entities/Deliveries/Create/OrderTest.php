<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Deliveries\Create\Combo;
use KMA\IikoTransport\Entities\Deliveries\Create\Customer;
use KMA\IikoTransport\Entities\Deliveries\Create\DeliveryPoint;
use KMA\IikoTransport\Entities\Deliveries\Create\DiscountsInfo;
use KMA\IikoTransport\Entities\Deliveries\Create\Guests;
use KMA\IikoTransport\Entities\Deliveries\Create\IikoCard5Info;
use KMA\IikoTransport\Entities\Deliveries\Create\Order;
use KMA\IikoTransport\Entities\Deliveries\Create\OrderItem;
use KMA\IikoTransport\Entities\Deliveries\Create\Payment;
use KMA\IikoTransport\Entities\Deliveries\Create\TipsPayment;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Order
 */
class OrderTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
            DeliveryPoint::class,
            $entity->deliveryPoint
        );
        $this->assertIsString($entity->comment);
        $this->assertInstanceOf(
            Customer::class,
            $entity->customer
        );
        $this->assertInstanceOf(
            Guests::class,
            $entity->guests
        );
        $this->assertIsUuid($entity->marketingSourceId);
        $this->assertIsUuid($entity->operatorId);
        // items
        $this->assertInstanceOf(
            Collection::class,
            $entity->items
        );
        $entity->items->each(function ($item) {
            $this->assertInstanceOf(
                OrderItem::class,
                $item
            );
        });
        // combos
        $this->assertInstanceOf(
            Collection::class,
            $entity->combos
        );
        $entity->combos->each(function ($combo) {
            $this->assertInstanceOf(
                Combo::class,
                $combo
            );
        });
        // payments
        $this->assertInstanceOf(
            Collection::class,
            $entity->payments
        );
        $entity->payments->each(function ($payment) {
            $this->assertInstanceOf(
                Payment::class,
                $payment
            );
        });
        // tips
        $this->assertInstanceOf(
            Collection::class,
            $entity->tips
        );
        $entity->tips->each(function ($tip) {
            $this->assertInstanceOf(
                TipsPayment::class,
                $tip
            );
        });
        $this->assertIsString($entity->sourceKey);
        $this->assertInstanceOf(
            DiscountsInfo::class,
            $entity->discountsInfo
        );
        $this->assertInstanceOf(
            IikoCard5Info::class,
            $entity->iikoCard5Info
        );
    }
}
