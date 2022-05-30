<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Dictionaries;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsRequest;

/**
 * @covers \KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsRequest
 */
class DiscountsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/DiscountsRequest'
    ];
    protected string $entityClass = DiscountsRequest::class;
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
