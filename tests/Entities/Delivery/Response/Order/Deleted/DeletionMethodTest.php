<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Deleted;

use KMA\IikoTransport\Tests\EntityTestCase;

class DeletionMethodTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/DeletionMethod.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\DeletionMethod::class;
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
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->comment);
        $this->assertInstanceOf(
            \KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted\RemovalType::class,
            $entity->removalType
        );
    }
}