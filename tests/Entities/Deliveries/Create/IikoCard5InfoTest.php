<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\IikoCard5Info;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\IikoCard5Info
 */
class IikoCard5InfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'order.iikoCard5Info'
    ];
    protected string $entityClass = IikoCard5Info::class;
    protected array $fields = [
        'coupon',
        'applicableManualConditions',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->coupon);
        $this->assertIsArray($entity->applicableManualConditions);
    }
}
