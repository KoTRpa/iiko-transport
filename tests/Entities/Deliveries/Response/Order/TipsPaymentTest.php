<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentType;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\TipsPaymentItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\TipsType;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\TipsPaymentItem
 */
class TipsPaymentTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.tips'
    ];
    protected string $entityClass = TipsPaymentItem::class;
    protected array $fields = [
        'tipsType',
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
            TipsType::class,
            $entity->tipsType
        );
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
