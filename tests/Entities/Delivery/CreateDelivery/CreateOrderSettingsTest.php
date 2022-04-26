<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class CreateOrderSettingsTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/json/CreateOrderSettings.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings::class;
    protected array $fields = [
        'transportToFrontTimeout',
    ];


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
