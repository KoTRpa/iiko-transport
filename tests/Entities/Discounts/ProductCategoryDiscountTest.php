<?php

namespace KMA\IikoTransport\Tests\Entities\Discounts;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Discounts\ProductCategoryDiscount;

/**
 * @covers \KMA\IikoTransport\Entities\Discounts\ProductCategoryDiscount
 */
class ProductCategoryDiscountTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/DiscountsResponse',
        'path' => 'discounts.items.productCategoryDiscounts'
    ];
    protected string $entityClass = ProductCategoryDiscount::class;
    protected array $fields = [
        'categoryId',
        'categoryName',
        'percent',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->categoryId);
        $this->assertIsString($entity->categoryName);
        $this->assertIsFloat($entity->percent);
    }
}
