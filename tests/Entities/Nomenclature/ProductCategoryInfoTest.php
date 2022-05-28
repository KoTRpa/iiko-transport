<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\ProductCategoryInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\ProductCategoryInfo
 */
class ProductCategoryInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'productCategories'
    ];
    protected string $entityClass = ProductCategoryInfo::class;
    protected array $fields = [
        'id',
        'name',
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
        $this->assertIsBool($entity->isDeleted);
    }
}
