<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class CreateOrderSettingsTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CreateOrderSettings.json';
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
