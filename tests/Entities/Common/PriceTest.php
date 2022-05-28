<?php

namespace KMA\IikoTransport\Tests\Entities\Common;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Common\Price;

/**
 * @covers \KMA\IikoTransport\Entities\Common\Price
 */
class PriceTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Common/Price'
    ];
    protected string $entityClass = Price::class;
    protected array $fields = [
        'currentPrice',
        'isIncludedInMenu',
        'nextPrice',
        'nextIncludedInMenu',
        'nextDatePrice',
    ];

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
