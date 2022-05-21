<?php

namespace KMA\IikoTransport\Tests\Entities\Menu\Menu;

use KMA\IikoTransport\Tests\EntityTestCase;

class MenuRequestTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/MenuRequest.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Menu\NomenclatureRequest::class;
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
