<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\Menu;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureRequest;

class NomenclatureRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/NomenclatureRequest'
    ];
    protected string $entityClass = NomenclatureRequest::class;
    protected array $fields = [
        'organizationId',
        'startRevision',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->organizationId);
        $this->assertIsInt($entity->startRevision);
    }
}
