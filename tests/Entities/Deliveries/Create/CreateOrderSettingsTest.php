<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\CreateOrderSettings;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\CreateOrderSettings
 */
class CreateOrderSettingsTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'createOrderSettings'
    ];
    protected string $entityClass = CreateOrderSettings::class;
    protected array $fields = [
        'transportToFrontTimeout',
    ];

    public function testCreateEntity()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsInt($entity->transportToFrontTimeout);
    }
}
