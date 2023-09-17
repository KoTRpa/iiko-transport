<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItemData;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItemData
 */
class RejectItemDataTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsResponse',
        'path' => 'rejectedItems.rejectItemData'
    ];
    protected string $entityClass = RejectItemData::class;
    protected array $fields = [
        'dateFrom',
        'dateTo',
        'allowedWeekDays',
        'minSum',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $datePattern = '/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}\.\d{3}$/';

        $this->assertIsString($entity->dateFrom);
        $this->assertMatchesRegularExpression($datePattern, $entity->dateFrom);
        $this->assertIsString($entity->dateTo);
        $this->assertMatchesRegularExpression($datePattern, $entity->dateTo);
        $this->assertIsArray($entity->allowedWeekDays);
        $this->assertIsFloat($entity->minSum);
    }
}
