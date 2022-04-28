<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order\Delivery\Response\Order\Response\Order\Response\Order\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class ProblemTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Problem.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Problem::class;
    protected array $fields = [
        'hasProblem',
        'description',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsBool($entity->hasProblem);
        $this->assertIsString($entity->description);
    }
}
