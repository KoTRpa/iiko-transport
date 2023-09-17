<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsResponse;
use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\AllowedItem;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsResponse
 */
class SuitableTerminalGroupsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsResponse'
    ];
    protected string $entityClass = SuitableTerminalGroupsResponse::class;
    protected array $fields = [
        'correlationId',
        'isAllowed',
        'addressExternalId',
        'location',
        'allowedItems',
        'rejectedItems',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertIsBool($entity->isAllowed);
        $this->assertIsString($entity->addressExternalId);
        $this->assertInstanceOf(Coordinates::class, $entity->location);
        $this->assertInstanceOf(Collection::class, $entity->allowedItems);
        $entity->allowedItems->each(
            fn(mixed $item) => $this->assertInstanceOf(AllowedItem::class, $item)
        );
        $this->assertInstanceOf(Collection::class, $entity->rejectedItems);
        $entity->rejectedItems->each(
            fn(mixed $item) => $this->assertInstanceOf(RejectItem::class, $item)
        );
    }
}
