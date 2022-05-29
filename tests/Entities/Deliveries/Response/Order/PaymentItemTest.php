<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentType;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentItem
 */
class PaymentItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.payments'
    ];
    protected string $entityClass = PaymentItem::class;
    protected array $fields = [
        'paymentType',
        'sum',
        'isPreliminary',
        'isExternal',
        'isProcessedExternally',
        'isFiscalizedExternally',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            PaymentType::class,
            $entity->paymentType
        );
        $this->assertIsFloat($entity->sum);
        $this->assertIsBool($entity->isPreliminary);
        $this->assertIsBool($entity->isExternal);
        $this->assertIsBool($entity->isProcessedExternally);
        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
