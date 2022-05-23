<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\Guests;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Guests
 */
class GuestsTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.guests'
    ];
    protected string $entityClass = Guests::class;
    protected array $fields = [
        'count',
        'splitBetweenPersons',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsInt($entity->count);
        $this->assertIsBool($entity->splitBetweenPersons);
    }
}
