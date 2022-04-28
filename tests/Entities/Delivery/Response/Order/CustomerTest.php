<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class CustomerTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Customer.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Customer::class;
    protected array $fields = [
        'id',
        'name',
        'surname',
        'comment',
        'gender',
        'inBlacklist',
        'blacklistReason',
        'birthdate',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->surname);
        $this->assertIsString($entity->comment);
        $this->assertIsString($entity->gender);
        $this->assertContains($entity->gender, ['NotSpecified', 'Male', 'Female']);
        $this->assertIsBool($entity->inBlacklist);
        $this->assertIsString($entity->blacklistReason);
        $this->assertIsString($entity->birthdate);
    }
}
