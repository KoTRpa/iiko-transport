<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\GroupModifierInfo;
use KMA\IikoTransport\Entities\Nomenclature\SimpleModifierInfo;
use KMA\IikoTransport\Entities\Nomenclature\SizePrice;
use KMA\IikoTransport\Entities\Nomenclature\ProductInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\ProductInfo
 */
class ProductInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'products'
    ];
    protected string $entityClass = ProductInfo::class;
    protected array $fields = [
        'fatAmount',
        'proteinsAmount',
        'carbohydratesAmount',
        'energyAmount',
        'fatFullAmount',
        'proteinsFullAmount',
        'carbohydratesFullAmount',
        'energyFullAmount',
        'weight',
        'groupId',
        'productCategoryId',
        'type',
        'orderItemType',
        'modifierSchemaId',
        'modifierSchemaName',
        'splittable',
        'measureUnit',
        'sizePrices',
        'modifiers',
        'groupModifiers',
        'imageLinks',
        'doNotPrintInCheque',
        'parentGroup',
        'order',
        'fullNameEnglish',
        'useBalanceForSell',
        'canSetOpenPrice',
        'id',
        'code',
        'name',
        'description',
        'additionalInfo',
        'tags',
        'isDeleted',
        'seoDescription',
        'seoText',
        'seoKeywords',
        'seoTitle',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsFloat($entity->fatAmount);
        $this->assertIsFloat($entity->proteinsAmount);
        $this->assertIsFloat($entity->carbohydratesAmount);
        $this->assertIsFloat($entity->energyAmount);
        $this->assertIsFloat($entity->fatFullAmount);
        $this->assertIsFloat($entity->proteinsFullAmount);
        $this->assertIsFloat($entity->carbohydratesFullAmount);
        $this->assertIsFloat($entity->energyFullAmount);
        $this->assertIsFloat($entity->weight);
        $this->assertIsUuid($entity->groupId);
        $this->assertIsUuid($entity->productCategoryId);
        $this->assertIsString($entity->type);
        $this->assertIsString($entity->orderItemType);
        $this->assertContains($entity->orderItemType, ['Product', 'Compound']);
        $this->assertIsUuid($entity->modifierSchemaId);
        $this->assertIsString($entity->modifierSchemaName);
        $this->assertIsBool($entity->splittable);
        $this->assertIsString($entity->measureUnit);

        $this->assertInstanceOf(
            Collection::class,
            $entity->sizePrices
        );
        $entity->sizePrices->each(function ($item) {
            $this->assertInstanceOf(
                SizePrice::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->modifiers
        );
        $entity->modifiers->each(function ($item) {
            $this->assertInstanceOf(
                SimpleModifierInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            Collection::class,
            $entity->groupModifiers
        );
        $entity->groupModifiers->each(function ($item) {
            $this->assertInstanceOf(
                GroupModifierInfo::class,
                $item
            );
        });

        $this->assertIsArray($entity->imageLinks);
        $this->assertIsBool($entity->doNotPrintInCheque);
        $this->assertIsUuid($entity->parentGroup);
        $this->assertIsInt($entity->order);
        $this->assertIsString($entity->fullNameEnglish);
        $this->assertIsBool($entity->useBalanceForSell);
        $this->assertIsBool($entity->canSetOpenPrice);
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->code);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->description);
        $this->assertIsString($entity->additionalInfo);
        $this->assertIsArray($entity->tags);
        $this->assertIsBool($entity->isDeleted);
        $this->assertIsString($entity->seoDescription);
        $this->assertIsString($entity->seoText);
        $this->assertIsString($entity->seoKeywords);
        $this->assertIsString($entity->seoTitle);
    }
}
