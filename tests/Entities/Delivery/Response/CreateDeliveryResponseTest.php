<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response;

use KMA\IikoTransport\Tests\EntityTestCase;

class CreateDeliveryResponseTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CreateDeliveryResponse.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse::class;
    protected array $fields = [
        'correlationId',
        'orderInfo',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse::fromJson
     *
     * @uses \KMA\IikoTransport\Entities\Delivery\Response\OrderInfo
     */
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
