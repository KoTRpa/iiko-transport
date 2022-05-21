<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class CreateOrderSettingsTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CreateOrderSettings.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings::class;
    protected array $fields = [
        'transportToFrontTimeout',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings::fromJson
     */
    public function testCreateEntity()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertObjectHasAttribute('transportToFrontTimeout', $entity);

        $this->assertIsInt($entity->transportToFrontTimeout);
    }
}
