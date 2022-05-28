<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Menu;

use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureResponse;
use KMA\IikoTransport\Tests\EntityTestCase;

class NomenclatureResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse'
    ];
    protected string $entityClass = NomenclatureResponse::class;
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
                \KMA\IikoTransport\Entities\Nomenclature\ProductsGroupInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->productCategories
        );
        $entity->productCategories->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Nomenclature\ProductCategoryInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->products
        );
        $entity->products->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Nomenclature\ProductInfo::class,
                $item
            );
        });

        $this->assertInstanceOf(
            \Illuminate\Support\Collection::class,
            $entity->sizes
        );
        $entity->sizes->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Nomenclature\Size::class,
                $item
            );
        });

        $this->assertIsInt($entity->revision);
    }
}
