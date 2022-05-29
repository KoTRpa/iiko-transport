<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Payment;
use KMA\IikoTransport\Entities\Deliveries\Create\PaymentAdditionalData;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Payment
 */
class PaymentTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
            PaymentAdditionalData::class,
            $entity->paymentAdditionalData
        );
        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
