<?php

namespace KMA\IikoTransport\Tests\Entities\Organizations;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Organizations\OrganizationInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Organizations\OrganizationInfo
 */
class OrganisationInfoTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Organizations/OrganizationsResponse',
        'path' => 'organizations'
    ];
    protected string $entityClass = OrganizationInfo::class;
    protected array $fields = [
        'responseType',
        'id',
        'name',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertEquals('Simple', $entity->responseType);
    }
}
