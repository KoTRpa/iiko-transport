<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Customer;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Customer
 */
class CustomerTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.customer'
    ];
    protected string $entityClass = Customer::class;
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
