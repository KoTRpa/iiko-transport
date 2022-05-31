<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\Houses;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\Houses
 */
class HousesTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RestrictionsResponse',
        'path' => 'deliveryRestrictions.deliveryZones.addresses.houses'
    ];
    protected string $entityClass = Houses::class;
    protected array $fields = [
        'type',
        'startingNumber',
        'maxNumber',
        'isUnlimitedRange',
        'specificNumbers',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsInt($entity->type);
        $this->assertIsInt($entity->startingNumber);
        $this->assertIsInt($entity->maxNumber);
        $this->assertIsBool($entity->isUnlimitedRange);
        $this->assertIsArray($entity->specificNumbers);
    }
}
