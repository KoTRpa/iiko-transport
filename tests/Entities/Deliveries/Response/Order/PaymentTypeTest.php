<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentType;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentType
 */
class PaymentTypeTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.payments.paymentType'
    ];
    protected string $entityClass = PaymentType::class;
    protected array $fields = [
        'id',
        'name',
        'kind',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->kind);
        $this->assertContains($entity->kind, [
            'Unknown',
            'Cash',
            'Card',
            'Credit',
            'Writeoff',
            'Voucher',
            'External',
            'SmartSale',
            'Sberbank',
            'Trpos',
        ]);
    }
}
