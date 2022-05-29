<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\ErrorInfo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\ErrorInfo
 */
class ErrorInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'errorInfo'
    ];
    protected string $entityClass = ErrorInfo::class;
    protected array $fields = [
        'code',
        'message',
        'description',
        'additionalData',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->code);
        $this->assertIsString($entity->message);
        $this->assertIsString($entity->description);
    }
}
