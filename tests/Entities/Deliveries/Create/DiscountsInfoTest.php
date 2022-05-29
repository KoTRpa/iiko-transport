<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Deliveries\Create\Card;
use KMA\IikoTransport\Entities\Deliveries\Create\Discount;
use KMA\IikoTransport\Entities\Deliveries\Create\DiscountsInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\DiscountsInfo
 */
class DiscountsInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
            Card::class,
            $entity->card
        );
        $this->assertInstanceOf(
            Collection::class,
            $entity->discounts
        );
        $entity->discounts->each(function ($item) {
            $this->assertInstanceOf(
                Discount::class,
                $item
            );
        });
    }
}
