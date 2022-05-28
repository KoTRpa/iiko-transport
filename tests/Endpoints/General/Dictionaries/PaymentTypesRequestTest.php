<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Dictionaries;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesRequest;

/**
 * @covers \KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesRequest
 */
class PaymentTypesRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/PaymentTypesRequest'
    ];
    protected string $entityClass = PaymentTypesRequest::class;
    protected array $fields = [
        'organizationIds',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsArray($entity->organizationIds);
    }
}
