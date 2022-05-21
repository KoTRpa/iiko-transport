<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Tests\EntityTestCase;

class DiscountTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Discount.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Discount::class;
    protected array $fields = [
        'discountTypeId',
        'sum',
        'selectivePositions',
        'type',
    ];

    /**
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Discount::__construct
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Discount::fromArray
     * @covers \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Discount::fromJson
     */
    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->discountTypeId);
        $this->assertIsFloat($entity->sum);
        $this->assertIsArray($entity->selectivePositions);
        $this->assertIsString($entity->type);
        $this->assertContains($entity->type, ['RMS', 'iikoCard']);}
}
