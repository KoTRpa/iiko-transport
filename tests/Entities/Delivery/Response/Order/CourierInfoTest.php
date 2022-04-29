<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class CourierInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CourierInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\CourierInfo::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Courier::class,
            $entity->courier
        );
        $this->assertIsBool($entity->isCourierSelectedManually);
    }
}
