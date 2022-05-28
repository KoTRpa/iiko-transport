<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Dictionaries;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesResponse;
use KMA\IikoTransport\Entities\PaymentTypes\PaymentType;

/**
 * @covers \KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesResponse
 */
class PaymentTypesResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/PaymentTypesResponse'
    ];
    protected string $entityClass = PaymentTypesResponse::class;
    protected array $fields = [
        'correlationId',
        'paymentTypes',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->paymentTypes);
        $entity->paymentTypes->each(function($item) {
            $this->assertInstanceOf(PaymentType::class, $item);
        });
    }
}
