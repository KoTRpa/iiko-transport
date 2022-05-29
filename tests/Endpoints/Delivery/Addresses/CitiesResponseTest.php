<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesResponse;
use KMA\IikoTransport\Entities\RmsItemsWrap\CitiesWrap;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesResponse
 */
class CitiesResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CitiesResponse'
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
