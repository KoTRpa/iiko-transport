<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class ChildModifierInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/ChildModifierInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo::class;
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

    /**
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo::fromJson
     */
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
