<?php

namespace KMA\IikoTransport\Tests\Entities;

use KMA\IikoTransport\Tests\EntityTestCase;

class CustomerTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Customer.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Customer::class;
    protected array $fields = [
        'id',
        'name',
        'surname',
        'comment',
        'birthdate',
        'email',
        'shouldReceiveOrderStatusNotifications',
        'gender',
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
        $this->assertIsString($entity->birthdate);
        $this->assertIsString($entity->email);
        $this->assertIsBool($entity->shouldReceiveOrderStatusNotifications);
        $this->assertIsString($entity->gender);
        $this->assertContains($entity->gender, ['NotSpecified', 'Male', 'Female']);
    }
}
