<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Common\Address\City;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesWrap;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Addresses\CitiesWrap
 */
class CitiesWrapTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CitiesResponse',
        'path' => 'cities'
    ];
    protected string $entityClass = CitiesWrap::class;
    protected array $fields = [
        'organizationId',
        'items',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertInstanceOf(Collection::class, $entity->items);
        $entity->items->each(function($item) {
            $this->assertInstanceOf(City::class, $item);
        });
    }
}
