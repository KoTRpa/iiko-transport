<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Deliveries\Create\Discount;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Create\Discount
 */
class DiscountTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CreateDeliveryRequest',
        'path' => 'order.discountsInfo.discounts'
    ];
    protected string $entityClass = Discount::class;
    protected array $fields = [
        'discountTypeId',
        'sum',
        'selectivePositions',
        'type',
    ];

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
