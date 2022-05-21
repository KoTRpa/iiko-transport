<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class PaymentTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Payment.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment::class;
    protected array $fields = [
        'paymentTypeKind',
        'sum',
        'paymentTypeId',
        'isProcessedExternally',
        'paymentAdditionalData',
        'isFiscalizedExternally',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment::fromJson
     */
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
            \KMA\IikoTransport\Entities\PaymentAdditionalData::class,
            $entity->paymentAdditionalData
        );

        $this->assertIsBool($entity->isFiscalizedExternally);
    }
}
