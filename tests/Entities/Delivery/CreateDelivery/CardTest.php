<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\Card;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Card
 */
class CardTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.discountsInfo.card'
    ];
    protected string $entityClass = Card::class;
    protected array $fields = [
        'track',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->track);
    }
}
