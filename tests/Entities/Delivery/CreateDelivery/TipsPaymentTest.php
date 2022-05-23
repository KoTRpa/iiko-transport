<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\TipsPayment;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\TipsPayment
 */
class TipsPaymentTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.tips'
    ];
    protected string $entityClass = TipsPayment::class;
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
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\PaymentAdditionalData::class,
            $entity->paymentAdditionalData
        );

        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
