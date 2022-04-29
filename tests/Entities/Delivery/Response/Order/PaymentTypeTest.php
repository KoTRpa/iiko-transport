<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class PaymentTypeTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/DiscountType.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\PaymentType::class;
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
