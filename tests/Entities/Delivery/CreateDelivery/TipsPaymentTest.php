<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class TipsPaymentTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/TipsPayment.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\TipsPayment::class;
    protected array $fields = [
        'paymentTypeKind',
        'tipsTypeId',
        'sum',
        'paymentTypeId',
        'isProcessedExternally',
        'paymentAdditionalData',
        'isFiscalizedExternally',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->paymentTypeKind);
        // TODO: paymentTypeKind enums testing
        // $this->assertContains($entity->paymentTypeKind, [
        //     'Cash',
        //     'Card',
        //     'External'
        // ]);

        $this->assertIsUuid($entity->tipsTypeId);

        $this->assertIsFloat($entity->sum);

        $this->assertIsUuid($entity->paymentTypeId);

        $this->assertIsBool($entity->isProcessedExternally);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\PaymentAdditionalData::class,
            $entity->paymentAdditionalData
        );

        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
