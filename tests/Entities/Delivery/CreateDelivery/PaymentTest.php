<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment
 */
class PaymentTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.payments'
    ];
    protected string $entityClass = Payment::class;
    protected array $fields = [
        'paymentTypeKind',
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
        //     'IikoCard',
        //     'External'
        // ]);

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
