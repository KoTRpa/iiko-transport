<?php

namespace KMA\IikoTransport\Tests\Entities\RmsItemsWrap;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Discounts\DiscountCardTypeInfo;
use KMA\IikoTransport\Entities\RmsItemsWrap\DiscountsWrap;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\RmsItemsWrap\DiscountsWrap
 */
class DiscountsWrapTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/DiscountsResponse',
        'path' => 'discounts'
    ];
    protected string $entityClass = DiscountsWrap::class;
    protected array $fields = [
        'organizationId',
        'items',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertInstanceOf(Collection::class, $entity->items);
        $entity->items->each(function($item) {
            $this->assertInstanceOf(DiscountCardTypeInfo::class, $item);
        });
    }
}
