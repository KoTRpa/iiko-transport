<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\CancelInfo;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Cause;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\CancelInfo
 */
class CancelInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.cancelInfo'
    ];
    protected string $entityClass = CancelInfo::class;
    protected array $fields = [
        'whenCancelled',
        'cause',
        'comment',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsDateTimeString($entity->whenCancelled);
        $this->assertInstanceOf(
            Cause::class,
            $entity->cause
        );
        $this->assertIsString($entity->comment);
    }
}
