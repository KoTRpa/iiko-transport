<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\PaymentAdditionalData;
use KMA\IikoTransport\Entities\Deliveries\Create\TipsPayment;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\TipsPayment
 */
class TipsPaymentTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
            PaymentAdditionalData::class,
            $entity->paymentAdditionalData
        );
        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
