<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\DiscountItem;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\DiscountType;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\DiscountItem
 */
class DiscountItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.discounts'
    ];
    protected string $entityClass = DiscountItem::class;
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
            DiscountType::class,
            $entity->discountType
        );
        $this->assertIsFloat($entity->sum);
        $this->assertIsArray($entity->selectivePositions);
    }
}
