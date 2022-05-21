<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class SizePriceTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/SizePrice.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\SizePrice::class;
    protected array $fields = [
        'sizeId',
        'price',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\SizePrice::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\SizePrice::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\SizePrice::fromJson
     *
     * @uses \KMA\IikoTransport\Entities\Common\Price::__construct
     */
    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->sizeId);
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Common\Price::class,
            $entity->price
        );
    }
}
