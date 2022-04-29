<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class DiscountItemTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/DiscountItem.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\DiscountItem::class;
    protected array $fields = [
        'discountType',
        'sum',
        'selectivePositions',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\DiscountType::class,
            $entity->discountType
        );
        $this->assertIsFloat($entity->sum);
        $this->assertIsArray($entity->selectivePositions);
    }
}
