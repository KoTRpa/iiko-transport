<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\ComboInformation;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\ComboInformation
 */
class ComboInformationTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.items.comboInformation'
    ];
    protected string $entityClass = ComboInformation::class;
    protected array $fields = [
        'comboId',
        'comboSourceId',
        'groupId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->comboId);
        $this->assertIsUuid($entity->comboSourceId);
        $this->assertIsUuid($entity->groupId);
    }
}
