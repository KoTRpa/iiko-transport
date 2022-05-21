<?php

namespace KMA\IikoTransport\Tests\Entities\Menu\Menu;

use KMA\IikoTransport\Tests\EntityTestCase;

class MenuResponseTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/MenuResponse.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Menu\NomenclatureResponse::class;
    protected array $fields = [
        'correlationId',
        'groups',
        'productCategories',
        'products',
        'sizes',
        'revision',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->groups
        );
        $entity->groups->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->productCategories
        );
        $entity->productCategories->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->products
        );
        $entity->products->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Common\Nomenclature\ProductInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->sizes
        );
        $entity->sizes->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Common\Nomenclature\Size::class,
                $item
            );
        });

        $this->assertIsInt($entity->revision);
    }
}
