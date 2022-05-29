<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Courier;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\CourierInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\CourierInfo
 */
class CourierInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.courierInfo'
    ];
    protected string $entityClass = CourierInfo::class;
    protected array $fields = [
        'courier',
        'isCourierSelectedManually',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            Courier::class,
            $entity->courier
        );
        $this->assertIsBool($entity->isCourierSelectedManually);
    }
}
