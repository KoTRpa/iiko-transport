<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItemModifier;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItemProduct;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\ProductGroup;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItemModifier
 */
class OrderItemModifierTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.items.modifiers'
    ];
    protected string $entityClass = OrderItemModifier::class;
    protected array $fields = [
        'product',
        'amount',
        'amountIndependentOfParentAmount',
        'productGroup',
        'price',
        'pricePredefined',
        'resultSum',
        'deleted',
        'positionId',
        'defaultAmount',
        'hideIfDefaultAmount',
        'taxPercent',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            OrderItemProduct::class,
            $entity->product
        );
        $this->assertIsFloat($entity->amount);
        $this->assertIsBool($entity->amountIndependentOfParentAmount);
        $this->assertInstanceOf(
            ProductGroup::class,
            $entity->productGroup
        );
        $this->assertIsFloat($entity->price);
        $this->assertIsBool($entity->pricePredefined);
        $this->assertIsFloat($entity->resultSum);
        $this->assertInstanceOf(
            Deleted::class,
            $entity->deleted
        );
        $this->assertIsUuid($entity->positionId);
        $this->assertIsInt($entity->defaultAmount);
        $this->assertIsBool($entity->hideIfDefaultAmount);
        $this->assertIsFloat($entity->taxPercent);
    }
}
