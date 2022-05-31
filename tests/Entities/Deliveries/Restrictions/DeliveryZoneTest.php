<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZone;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZoneAddressBinding;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZone
 */
class DeliveryZoneTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RestrictionsResponse',
        'path' => 'deliveryRestrictions.deliveryZones'
    ];
    protected string $entityClass = DeliveryZone::class;
    protected array $fields = [
        'name',
        'coordinates',
        'addresses',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->name);
        $this->assertInstanceOf(Collection::class, $entity->coordinates);
        $entity->coordinates->each(function ($item): void {
            $this->assertInstanceOf(Coordinates::class, $item);
        });
        $this->assertInstanceOf(Collection::class, $entity->addresses);
        $entity->addresses->each(function ($item): void {
            $this->assertInstanceOf(DeliveryZoneAddressBinding::class, $item);
        });
    }
}
