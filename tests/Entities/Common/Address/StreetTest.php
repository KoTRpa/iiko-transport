<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Address;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Common\Address\Street;

/**
 * @covers \KMA\IikoTransport\Entities\Common\Address\Street
 */
class StreetTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Common/Address/Street'
    ];
    protected string $entityClass = Street::class;
    protected array $fields = [
        'id',
        'name',
        'externalRevision',
        'classifierId',
        'isDeleted',
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
        $this->assertIsString($entity->classifierId);
        $this->assertIsBool($entity->isDeleted);
    }
}
