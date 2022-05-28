<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesWrap;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesResponse;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Addresses\CitiesResponse
 */
class CitiesResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CitiesResponse'
    ];
    protected string $entityClass = CitiesResponse::class;
    protected array $fields = [
        'correlationId',
        'cities',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->cities);
        $entity->cities->each(function($item) {
            $this->assertInstanceOf(CitiesWrap::class, $item);
        });
    }
}
