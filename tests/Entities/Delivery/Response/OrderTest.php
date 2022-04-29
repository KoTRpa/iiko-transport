<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Order.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Customer::class,
            $entity->customer
        );

        $this->assertIsString($entity->phone);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\DeliveryPoint::class,
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\CancelInfo::class,
            $entity->cancelInfo
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\CourierInfo::class,
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Problem::class,
            $entity->problem
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Operator::class,
            $entity->operator
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\MarketingSource::class,
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\ExternalCourierService::class,
            $entity->externalCourierService
        );

        $this->assertIsFloat($entity->sum);
        $this->assertIsInt($entity->number);

        $this->assertIsString($entity->sourceKey);

        $this->assertIsDateTimeString($entity->whenBillPrinted);
        $this->assertIsDateTimeString($entity->whenClosed);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Conception::class,
            $entity->conception
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\GuestsInfo::class,
            $entity->guestsInfo
        );

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->items
        );
        $entity->items->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItem::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->combos
        );
        $entity->combos->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderCombo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->payments
        );
        $entity->payments->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\Response\Order\PaymentItem::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->tips
        );
        $entity->tips->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\Response\Order\TipsPaymentItem::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->discounts
        );
        $entity->discounts->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\Response\Order\DiscountItem::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderType::class,
            $entity->orderType
        );

        $this->assertIsUuid($entity->terminalGroupId);

        $this->assertIsFloat($entity->processedPaymentsSum);
    }
}
