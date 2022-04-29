<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class GuestsInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/GuestsInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\GuestsInfo::class;
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
