<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/DeliveryOrderInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\OrderInfo::class;
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
            \KMA\IikoTransport\Entities\ErrorInfo::class,
            $entity->errorInfo
        );

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order::class,
            $entity->createOrderSettings
        );
    }
}
