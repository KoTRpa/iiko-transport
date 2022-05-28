<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\SizePrice;
use KMA\IikoTransport\Entities\Common\Price;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\SizePrice
 */
class SizePriceTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'products.sizePrices'
    ];
    protected string $entityClass = SizePrice::class;
    protected array $fields = [
        'sizeId',
        'price',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->sizeId);
        $this->assertInstanceOf(
            Price::class,
            $entity->price
        );
    }
}
