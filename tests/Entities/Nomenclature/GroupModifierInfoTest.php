<?php

namespace KMA\IikoTransport\Tests\Entities\Nomenclature;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Nomenclature\ChildModifierInfo;
use KMA\IikoTransport\Entities\Nomenclature\GroupModifierInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Nomenclature\GroupModifierInfo
 */
class GroupModifierInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureResponse',
        'path' => 'products.groupModifiers'
    ];
    protected string $entityClass = GroupModifierInfo::class;
    protected array $fields = [
        'id',
        'minAmount',
        'maxAmount',
        'required',
        'childModifiersHaveMinMaxRestrictions',
        'childModifiers',
        'hideIfDefaultAmount',
        'defaultAmount',
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
        $this->assertIsInt($entity->minAmount);
        $this->assertIsInt($entity->maxAmount);
        $this->assertIsBool($entity->required);
        $this->assertIsBool($entity->childModifiersHaveMinMaxRestrictions);

        $this->assertInstanceOf(
            Collection::class,
            $entity->childModifiers
        );
        $entity->childModifiers->each(function ($item) {
            $this->assertInstanceOf(
                ChildModifierInfo::class,
                $item
            );
        });

        $this->assertIsBool($entity->hideIfDefaultAmount);
        $this->assertIsInt($entity->defaultAmount);
        $this->assertIsBool($entity->splittable);
        $this->assertIsInt($entity->freeOfChargeAmount);
    }
}
