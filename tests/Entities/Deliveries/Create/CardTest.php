<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Card;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Card
 */
class CardTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
