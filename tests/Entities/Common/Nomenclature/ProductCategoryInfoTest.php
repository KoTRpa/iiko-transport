<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class ProductCategoryInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/ProductCategoryInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo::class;
    protected array $fields = [
        'id',
        'name',
        'isDeleted',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo::fromJson
     */
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
