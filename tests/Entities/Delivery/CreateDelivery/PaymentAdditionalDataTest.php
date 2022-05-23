<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\PaymentAdditionalData;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\PaymentAdditionalData
 */
class PaymentAdditionalDataTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.payments.paymentAdditionalData'
    ];
    protected string $entityClass = PaymentAdditionalData::class;
    protected array $fields = [
        'credential',
        'searchScope',
        'type',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->credential);
        $this->assertIsString($entity->searchScope);
        $this->assertContains($entity->searchScope, [
            'Reserved',
            'Phone',
            'CardNumber',
            'CardTrack',
            'PaymentToken',
            'FindFaceId',
        ]);
        $this->assertEquals('IikoCard', $entity->type);
    }
}
