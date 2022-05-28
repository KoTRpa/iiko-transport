<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Common\Address\Street;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Addresses\StreetsResponse;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Addresses\StreetsResponse
 */
class StreetsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/StreetsResponse'
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
