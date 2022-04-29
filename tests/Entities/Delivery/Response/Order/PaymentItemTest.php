<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class PaymentItemTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Payment.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\PaymentItem::class;
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
