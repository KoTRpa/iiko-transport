<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\ChildModifierInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\ChildModifierInfo
 */
class ChildModifierInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'products.groupModifiers.childModifiers'
    ];
    protected string $entityClass = ChildModifierInfo::class;
    protected array $fields = [
        'id',
        'defaultAmount',
        'minAmount',
        'maxAmount',
        'required',
        'hideIfDefaultAmount',
        'splittable',
        'freeOfChargeAmount',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsInt($entity->defaultAmount);
        $this->assertIsInt($entity->minAmount);
        $this->assertIsInt($entity->maxAmount);
        $this->assertIsBool($entity->required);
        $this->assertIsBool($entity->hideIfDefaultAmount);
        $this->assertIsBool($entity->splittable);
        $this->assertIsInt($entity->freeOfChargeAmount);
    }
}
