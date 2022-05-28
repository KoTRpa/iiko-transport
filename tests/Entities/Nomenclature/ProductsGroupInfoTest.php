<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\ProductsGroupInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\ProductsGroupInfo
 */
class ProductsGroupInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'groups'
    ];
    protected string $entityClass = ProductsGroupInfo::class;
    protected array $fields = [
        'imageLinks',
        'parentGroup',
        'order',
        'isIncludedInMenu',
        'isGroupModifier',
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
        $this->assertIsArray($entity->imageLinks);
        $this->assertIsUuid($entity->parentGroup);
        $this->assertIsInt($entity->order);
        $this->assertIsBool($entity->isIncludedInMenu);
        $this->assertIsBool($entity->isGroupModifier);
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
