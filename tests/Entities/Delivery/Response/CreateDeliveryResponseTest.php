<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response;

use KMA\IikoTransport\Tests\EntityTestCase;

class CreateDeliveryResponseTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CreateDeliveryResponse.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse::class;
    protected array $fields = [
        'correlationId',
        'orderInfo',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);

        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\OrderInfo::class,
            $entity->orderInfo
        );
    }
}
