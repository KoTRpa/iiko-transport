<?php

namespace KMA\IikoTransport\Tests\Entities\RmsItemsWrap;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Address\City;
use KMA\IikoTransport\Entities\RmsItemsWrap\CitiesWrap;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\RmsItemsWrap\CitiesWrap
 */
class CitiesWrapTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CitiesResponse',
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
