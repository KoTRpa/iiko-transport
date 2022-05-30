<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Dictionaries;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsResponse;
use KMA\IikoTransport\Entities\RmsItemsWrap\DiscountsWrap;

/**
 * @covers \KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsResponse
 */
class DiscountsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/DiscountsResponse'
    ];
    protected string $entityClass = DiscountsResponse::class;
    protected array $fields = [
        'correlationId',
        'discounts',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->discounts);
        $entity->discounts->each(function($item) {
            $this->assertInstanceOf(DiscountsWrap::class, $item);
        });
    }
}
