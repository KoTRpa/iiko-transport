<?php

namespace KMA\IikoTransport\Tests\Entities\Organizations;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Organizations\OrganizationsRequest;

/**
 * @covers \KMA\IikoTransport\Entities\Organizations\OrganizationsRequest
 */
class OrganisationsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Organizations/OrganizationsRequest'
    ];
    protected string $entityClass = OrganizationsRequest::class;
    protected array $fields = [
        'organizationIds',
        'returnAdditionalInfo',
        'includeDisabled',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsArray($entity->organizationIds);
        $this->assertIsBool($entity->returnAdditionalInfo);
        $this->assertIsBool($entity->includeDisabled);
    }
}
