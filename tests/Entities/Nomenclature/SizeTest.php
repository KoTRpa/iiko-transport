<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\Size;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\Size
 */
class SizeTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'sizes'
    ];
    protected string $entityClass = Size::class;
    protected array $fields = [
        'id',
        'name',
        'priority',
        'isDefault',
    ];

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
