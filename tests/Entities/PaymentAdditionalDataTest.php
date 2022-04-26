<?php

namespace KMA\IikoTransport\Tests\Entities;

use KMA\IikoTransport\Tests\EntityTestCase;

class PaymentAdditionalDataTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/PaymentAdditionalData.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\PaymentAdditionalData::class;
    protected array $fields = [
        'credential',
        'searchScope',
        'type',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->credential);
        $this->assertIsString($entity->searchScope);
        $this->assertContains($entity->searchScope, [
            'Reserved',
            'Phone',
            'CardNumber',
            'CardTrack',
            'PaymentToken',
            'FindFaceId',
        ]);
        $this->assertEquals('IikoCard', $entity->type);
    }
}
