<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\DiscountsInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\DiscountsInfo
 */
class DiscountsInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.discountsInfo'
    ];
    protected string $entityClass = DiscountsInfo::class;
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
            \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Card::class,
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
