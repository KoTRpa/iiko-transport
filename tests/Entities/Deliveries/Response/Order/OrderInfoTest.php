<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\ErrorInfo;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Order;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo
 */
class OrderInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo'
    ];
    protected string $entityClass = OrderInfo::class;
    protected array $fields = [
        'id',
        'organizationId',
        'timestamp',
        'creationStatus',
        'errorInfo',
        'order',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsInt($entity->timestamp);
        $this->assertIsString($entity->creationStatus);
        $this->assertContains(
            $entity->creationStatus,
            ['Success', 'InProgress', 'Error']
        );

        $this->assertInstanceOf(
            ErrorInfo::class,
            $entity->errorInfo
        );

        $this->assertInstanceOf(
            Order::class,
            $entity->order
        );
    }
}
