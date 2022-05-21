<?php

namespace KMA\IikoTransport\Tests\Entities\Common;

use KMA\IikoTransport\Tests\EntityTestCase;

class PriceTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Price.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Price::class;
    protected array $fields = [
        'currentPrice',
        'isIncludedInMenu',
        'nextPrice',
        'nextIncludedInMenu',
        'nextDatePrice',
    ];
    /**
     * @covers \KMA\IikoTransport\Entities\Common\Price::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Price::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Price::fromJson
     */
    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsFloat($entity->currentPrice);
        $this->assertIsBool($entity->isIncludedInMenu);
        $this->assertIsFloat($entity->nextPrice);
        $this->assertIsBool($entity->nextIncludedInMenu);
        $this->assertIsDateTimeString($entity->nextDatePrice);
    }
}
