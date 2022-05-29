<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted\DeletionMethod;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted
 */
class DeletedTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.items.deleted'
    ];
    protected string $entityClass = Deleted::class;
    protected array $fields = [
        'deletionMethod',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertInstanceOf(
            DeletionMethod::class,
            $entity->deletionMethod
        );
    }
}
