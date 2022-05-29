<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\CancelInfo;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Conception;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\CourierInfo;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Customer;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\DeliveryPoint;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\DiscountItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\ExternalCourierService;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\GuestsInfo;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\MarketingSource;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Operator;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Order;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderCombo;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderType;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Problem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\TipsPaymentItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Order
 */
class OrderTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order'
    ];
    protected string $entityClass = Order::class;
    protected array $fields = [
        'parentDeliveryId',
        'customer',
        'phone',
        'deliveryPoint',
        'status',
        'cancelInfo',
        'courierInfo',
        'completeBefore',
        'whenCreated',
        'whenConfirmed',
        'whenPrinted',
        'whenSended',
        'whenDelivered',
        'comment',
        'problem',
        'operator',
        'marketingSource',
        'deliveryDuration',
        'indexInCourierRoute',
        'cookingStartTime',
        'isDeleted',
        'whenReceivedByApi',
        'whenReceivedFromFront',
        'movedFromDeliveryId',
        'movedFromTerminalGroupId',
        'movedFromOrganizationId',
        'externalCourierService',
        'sum',
        'number',
        'sourceKey',
        'whenBillPrinted',
        'whenClosed',
        'conception',
        'guestsInfo',
        'items',
        'combos',
        'payments',
        'tips',
        'discounts',
        'orderType',
        'terminalGroupId',
        'processedPaymentsSum',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->parentDeliveryId);
        $this->assertInstanceOf(
            Customer::class,
            $entity->customer
        );
        $this->assertIsString($entity->phone);
        $this->assertInstanceOf(
            DeliveryPoint::class,
            $entity->deliveryPoint
        );
        $this->assertIsString($entity->status);
        $this->assertContains($entity->status, [
            'Unconfirmed',
            'WaitCooking',
            'ReadyForCooking',
            'CookingStarted',
            'CookingCompleted',
            'Waiting',
            'OnWay',
            'Delivered',
            'Closed',
            'Cancelled',
        ]);
        $this->assertInstanceOf(
            CancelInfo::class,
            $entity->cancelInfo
        );
        $this->assertInstanceOf(
            CourierInfo::class,
            $entity->courierInfo
        );
        $this->assertIsDateTimeString($entity->completeBefore);
        $this->assertIsDateTimeString($entity->whenCreated);
        $this->assertIsDateTimeString($entity->whenConfirmed);
        $this->assertIsDateTimeString($entity->whenPrinted);
        $this->assertIsDateTimeString($entity->whenSended);
        $this->assertIsDateTimeString($entity->whenDelivered);
        $this->assertIsString($entity->comment);
        $this->assertInstanceOf(
            Problem::class,
            $entity->problem
        );
        $this->assertInstanceOf(
            Operator::class,
            $entity->operator
        );
        $this->assertInstanceOf(
            MarketingSource::class,
            $entity->marketingSource
        );
        $this->assertIsInt($entity->deliveryDuration);
        $this->assertIsInt($entity->indexInCourierRoute);
        $this->assertIsDateTimeString($entity->cookingStartTime);
        $this->assertIsBool($entity->isDeleted);
        $this->assertIsDateTimeString($entity->whenReceivedByApi);
        $this->assertIsDateTimeString($entity->whenReceivedFromFront);
        $this->assertIsUuid($entity->movedFromDeliveryId);
        $this->assertIsUuid($entity->movedFromTerminalGroupId);
        $this->assertIsUuid($entity->movedFromOrganizationId);
        $this->assertInstanceOf(
            ExternalCourierService::class,
            $entity->externalCourierService
        );
        $this->assertIsFloat($entity->sum);
        $this->assertIsInt($entity->number);
        $this->assertIsString($entity->sourceKey);
        $this->assertIsDateTimeString($entity->whenBillPrinted);
        $this->assertIsDateTimeString($entity->whenClosed);
        $this->assertInstanceOf(
            Conception::class,
            $entity->conception
        );
        $this->assertInstanceOf(
            GuestsInfo::class,
            $entity->guestsInfo
        );
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
        $this->assertInstanceOf(
            Collection::class,
            $entity->combos
        );
        $entity->combos->each(function ($item) {
            $this->assertInstanceOf(
                OrderCombo::class,
                $item
            );
        });
        $this->assertInstanceOf(
            Collection::class,
            $entity->payments
        );
        $entity->payments->each(function ($item) {
            $this->assertInstanceOf(
                PaymentItem::class,
                $item
            );
        });
        $this->assertInstanceOf(
            Collection::class,
            $entity->tips
        );
        $entity->tips->each(function ($item) {
            $this->assertInstanceOf(
                TipsPaymentItem::class,
                $item
            );
        });
        $this->assertInstanceOf(
            Collection::class,
            $entity->discounts
        );
        $entity->discounts->each(function ($item) {
            $this->assertInstanceOf(
                DiscountItem::class,
                $item
            );
        });
        $this->assertInstanceOf(
            OrderType::class,
            $entity->orderType
        );
        $this->assertIsUuid($entity->terminalGroupId);
        $this->assertIsFloat($entity->processedPaymentsSum);
    }
}
