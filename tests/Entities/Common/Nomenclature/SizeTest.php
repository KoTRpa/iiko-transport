<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class SizeTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Size.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\Size::class;
    protected array $fields = [
        'id',
        'name',
        'priority',
        'isDefault',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\Size::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\Size::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\Size::fromJson
     */
    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsInt($entity->priority);
        $this->assertIsBool($entity->isDefault);
    }
}
