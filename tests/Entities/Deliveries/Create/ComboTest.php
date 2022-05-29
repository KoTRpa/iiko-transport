<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Combo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Combo
 */
class ComboTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'order.combos'
    ];
    protected string $entityClass = Combo::class;
    protected array $fields = [
        'id',
        'name',
        'amount',
        'price',
        'sourceId',
        'programId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsInt($entity->amount);
        $this->assertIsFloat($entity->price);
        $this->assertIsUuid($entity->sourceId);
        $this->assertIsUuid($entity->programId);
    }
}
