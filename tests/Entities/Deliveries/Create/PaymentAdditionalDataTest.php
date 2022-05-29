<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\PaymentAdditionalData;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\PaymentAdditionalData
 */
class PaymentAdditionalDataTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
