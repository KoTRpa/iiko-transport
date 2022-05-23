<?php

namespace KMA\IikoTransport\Tests\Entities\Organizations;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Organizations\OrganizationsResponse;
use KMA\IikoTransport\Entities\Common\Organizations\OrganizationInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Organizations\OrganizationsResponse
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
