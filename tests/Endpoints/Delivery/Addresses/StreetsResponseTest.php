<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsResponse;
use KMA\IikoTransport\Entities\Address\Street;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsResponse
 */
class StreetsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/StreetsResponse'
    ];
    protected string $entityClass = StreetsResponse::class;
    protected array $fields = [
        'correlationId',
        'streets',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->streets);
        $entity->streets->each(function($item) {
            $this->assertInstanceOf(Street::class, $item);
        });
    }
}
