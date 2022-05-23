<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Organizations;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Common\Organizations\OrganizationInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Common\Organizations\OrganizationInfo
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
        $this->assertContains($entity->responseType, [
            'Simple',
            'Extended',
        ]);
    }
}
