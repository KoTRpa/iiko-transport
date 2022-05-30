<?php

namespace KMA\IikoTransport\Tests\Entities\Discounts;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Discounts\ProductCategoryDiscount;
use KMA\IikoTransport\Enums\DiscountMode;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Discounts\DiscountCardTypeInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Discounts\DiscountCardTypeInfo
 */
class DiscountCardTypeInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/DiscountsResponse',
        'path' => 'discounts.items'
    ];
    protected string $entityClass = DiscountCardTypeInfo::class;
    protected array $fields = [
        'id',
        'name',
        'percent',
        'isCategorisedDiscount',
        'productCategoryDiscounts',
        'comment',
        'canBeAppliedSelectively',
        'minOrderSum',
        'mode',
        'sum',
        'canApplyByCardNumber',
        'isManual',
        'isCard',
        'isAutomatic',
        'isDeleted',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsFloat($entity->percent);
        $this->assertIsBool($entity->isCategorisedDiscount);
        $this->assertInstanceOf(Collection::class, $entity->productCategoryDiscounts);
        $entity->productCategoryDiscounts->each(function($item) {
            $this->assertInstanceOf(ProductCategoryDiscount::class, $item);
        });
        $this->assertIsString($entity->comment);
        $this->assertIsBool($entity->canBeAppliedSelectively);
        $this->assertIsFloat($entity->minOrderSum);
        $this->assertContains($entity->mode, DiscountMode::cases());
        $this->assertIsFloat($entity->sum);
        $this->assertIsBool($entity->canApplyByCardNumber);
        $this->assertIsBool($entity->isManual);
        $this->assertIsBool($entity->isCard);
        $this->assertIsBool($entity->isAutomatic);
        $this->assertIsBool($entity->isDeleted);
    }
}
