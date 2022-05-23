<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\ComboInformation;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\ComboInformation
 */
class ComboInformationTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
        'path' => 'order.items.comboInformation'
    ];
    protected string $entityClass = ComboInformation::class;
    protected array $fields = [
        'comboId',
        'comboSourceId',
        'comboGroupId',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->comboId);
        $this->assertIsUuid($entity->comboSourceId);
        $this->assertIsUuid($entity->comboGroupId);
    }
}
