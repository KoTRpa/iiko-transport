<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\IikoCard5Info;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\IikoCard5Info
 */
class IikoCard5InfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CreateDeliveryRequest',
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
