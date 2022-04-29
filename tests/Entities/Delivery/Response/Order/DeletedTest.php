<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class DeletedTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Deleted.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted::class;
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
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted\DeletionMethod::class,
            $entity->deletionMethod
        );
    }
}
