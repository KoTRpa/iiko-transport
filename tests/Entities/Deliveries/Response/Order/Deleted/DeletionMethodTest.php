<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order\Deleted;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted\DeletionMethod;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted\RemovalType;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted\DeletionMethod
 */
class DeletionMethodTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.items.deleted.deletionMethod'
    ];
    protected string $entityClass = DeletionMethod::class;
    protected array $fields = [
        'id',
        'comment',
        'removalType',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsString($entity->id);
        $this->assertIsString($entity->comment);
        $this->assertInstanceOf(
            RemovalType::class,
            $entity->removalType
        );
    }
}
