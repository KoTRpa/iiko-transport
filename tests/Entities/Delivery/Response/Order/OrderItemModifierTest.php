<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderItemModifierTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/OrderItemModifier.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItemModifier::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItemProduct::class,
            $entity->product
        );

        $this->assertIsFloat($entity->amount);
        $this->assertIsBool($entity->amountIndependentOfParentAmount);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\ProductGroup::class,
            $entity->productGroup
        );

        $this->assertIsFloat($entity->price);
        $this->assertIsBool($entity->pricePredefined);
        $this->assertIsFloat($entity->resultSum);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted::class,
            $entity->deleted
        );

        $this->assertIsUuid($entity->positionId);
        $this->assertIsInt($entity->defaultAmount);
        $this->assertIsBool($entity->hideIfDefaultAmount);
        $this->assertIsFloat($entity->taxPercent);
    }
}
