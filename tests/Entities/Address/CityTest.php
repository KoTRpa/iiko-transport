<?php

namespace KMA\IikoTransport\Tests\Entities\Address;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Address\City;

/**
 * @covers \KMA\IikoTransport\Entities\Address\City
 */
class CityTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Address/City'
    ];
    protected string $entityClass = City::class;
    protected array $fields = [
        'id',
        'name',
        'externalRevision',
        'isDeleted',
        'classifierId',
        'additionalInfo',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsInt($entity->externalRevision);
        $this->assertIsBool($entity->isDeleted);
        $this->assertIsString($entity->classifierId);
        $this->assertIsString($entity->additionalInfo);
    }
}
