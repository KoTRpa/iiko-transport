<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZoneAddressBinding;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\Houses;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZoneAddressBinding
 */
class DeliveryZoneAddressBindingTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RestrictionsResponse',
        'path' => 'deliveryRestrictions.deliveryZones.addresses'
    ];
    protected string $entityClass = DeliveryZoneAddressBinding::class;
    protected array $fields = [
        'streetId',
        'postcode',
        'houses',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->streetId);
        $this->assertIsString($entity->postcode);
        $this->assertInstanceOf(Houses::class, $entity->houses);
    }
}
