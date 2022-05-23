<?php

namespace KMA\IikoTransport\Tests\Entities\Common\PaymentTypes;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Common\PaymentTypes\PaymentType;
use KMA\IikoTransport\Entities\Common\Terminals\TerminalGroup;

/**
 * @covers \KMA\IikoTransport\Entities\Common\PaymentTypes\PaymentType
 */
class PaymentTypeTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/PaymentTypesResponse',
        'path' => 'paymentTypes'
    ];
    protected string $entityClass = PaymentType::class;
    protected array $fields = [
        'id',
        'code',
        'name',
        'comment',
        'combinable',
        'externalRevision',
        'applicableMarketingCampaigns',
        'isDeleted',
        'printCheque',
        'paymentProcessingType',
        'paymentTypeKind',
        'terminalGroups',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->code);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->comment);
        $this->assertIsBool($entity->combinable);
        $this->assertIsInt($entity->externalRevision);
        $this->assertIsArray($entity->applicableMarketingCampaigns);
        $this->assertIsBool($entity->isDeleted);
        $this->assertIsBool($entity->printCheque);
        $this->assertContains($entity->paymentProcessingType, [
            'External',
            'Internal',
            'Both',
        ]);
        $this->assertContains($entity->paymentTypeKind, [
            'Unknown',
            'Cash',
            'Card',
            'Credit',
            'Writeoff',
            'Voucher',
            'External',
            'IikoCard',
        ]);
        $this->assertInstanceOf(Collection::class, $entity->terminalGroups);
        $entity->terminalGroups->each(function ($item) {
            $this->assertInstanceOf(TerminalGroup::class, $item);
        });
    }
}
