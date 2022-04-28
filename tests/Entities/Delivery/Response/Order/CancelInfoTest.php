<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class CancelInfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/CancelInfo.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\CancelInfo::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Cause::class,
            $entity->cause
        );
        $this->assertIsString($entity->comment);
    }
}
