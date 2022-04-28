<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class DiscountsInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/DiscountsInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\DiscountsInfo::class;
    protected array $fields = [
        'card',
        'discounts',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Card::class,
            $entity->card
        );

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->discounts
        );
        $entity->discounts->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Discount::class,
                $item
            );
        });
    }
}
