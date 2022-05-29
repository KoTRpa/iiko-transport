<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\GuestsInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\GuestsInfo
 */
class GuestsInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.guestsInfo'
    ];
    protected string $entityClass = GuestsInfo::class;
    protected array $fields = [
        'count',
        'splitBetweenPersons',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsInt($entity->count);
        $this->assertIsBool($entity->splitBetweenPersons);
    }
}
