<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryAddress;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItem;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsRequest;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsRequest
 */
class SuitableTerminalGroupsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsRequest'
    ];
    protected string $entityClass = SuitableTerminalGroupsRequest::class;
    protected array $fields = [
        'organizationIds',
        'deliveryAddress',
        'orderLocation',
        'orderItems',
        'isCourierDelivery',
        'deliveryDate',
        'deliverySum',
        'discountSum',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsArray($entity->organizationIds);
        $this->assertInstanceOf(DeliveryAddress::class, $entity->deliveryAddress);
        $this->assertInstanceOf(Coordinates::class, $entity->orderLocation);
        $this->assertInstanceOf(Collection::class, $entity->orderItems);
        $entity->orderItems->each(
            fn(mixed $orderItem) => $this->assertInstanceOf(RestrictionsOrderItem::class, $orderItem)
        );
        $this->assertIsBool($entity->isCourierDelivery);
        $this->assertIsDateTimeString($entity->deliveryDate);
        $this->assertMatchesRegularExpression(
            '/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}\.\d{3}$/',
            $entity->deliveryDate
        );
        $this->assertIsFloat($entity->deliverySum);
        $this->assertIsFloat($entity->discountSum);
    }
}
