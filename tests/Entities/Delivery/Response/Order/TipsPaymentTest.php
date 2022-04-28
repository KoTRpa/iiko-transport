<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class TipsPaymentTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/TipsPayment.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\TipsPayment::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\TipsType::class,
            $entity->tipsType
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\PaymentType::class,
            $entity->paymentType
        );

        $this->assertIsFloat($entity->sum);

        $this->assertIsBool($entity->isPreliminary);
        $this->assertIsBool($entity->isExternal);
        $this->assertIsBool($entity->isProcessedExternally);
        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
