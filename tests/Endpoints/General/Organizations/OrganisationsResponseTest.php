<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Organizations;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsResponse;
use KMA\IikoTransport\Entities\Organizations\OrganizationInfo;

/**
 * @covers \KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsResponse
 */
class OrganisationsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Organizations/OrganizationsResponse'
    ];
    protected string $entityClass = OrganizationsResponse::class;
    protected array $fields = [
        'correlationId',
        'organizations',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->organizations);
        $entity->organizations->each(function ($item) {
            $this->assertInstanceOf(OrganizationInfo::class, $item);
        });
    }
}
