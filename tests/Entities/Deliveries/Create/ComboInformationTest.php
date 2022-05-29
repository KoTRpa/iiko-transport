<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\ComboInformation;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\ComboInformation
 */
class ComboInformationTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
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
