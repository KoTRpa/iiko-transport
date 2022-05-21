<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class ProductsGroupInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/ProductsGroupInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo::class;
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

    /**
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo::fromJson
     */
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
