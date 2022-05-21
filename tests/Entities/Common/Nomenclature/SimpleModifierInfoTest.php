<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Nomenclature;

use KMA\IikoTransport\Tests\EntityTestCase;

class SimpleModifierInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/SimpleModifierInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Common\Nomenclature\SimpleModifierInfo::class;
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
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\SimpleModifierInfo::__construct
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\SimpleModifierInfo::fromArray
     * @covers \KMA\IikoTransport\Entities\Common\Nomenclature\SimpleModifierInfo::fromJson
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
