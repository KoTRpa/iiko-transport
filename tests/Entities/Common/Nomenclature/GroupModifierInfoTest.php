<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class GroupModifierInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/GroupModifierInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\GroupModifierInfo::class;
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

    /**
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\GroupModifierInfo::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\GroupModifierInfo::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\GroupModifierInfo::fromJson
     * @uses \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo::__construct
     */
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
            \Illuminate\Support\Collection::class,
            $entity->childModifiers
        );
        $entity->childModifiers->each(function ($item) {
            $this->assertInstanceOf(
                \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo::class,
                $item
            );
        });

        $this->assertIsBool($entity->hideIfDefaultAmount);
        $this->assertIsInt($entity->defaultAmount);
        $this->assertIsBool($entity->splittable);
        $this->assertIsInt($entity->freeOfChargeAmount);
    }
}
