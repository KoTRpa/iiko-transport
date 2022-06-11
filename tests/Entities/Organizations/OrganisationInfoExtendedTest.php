<?php

namespace KMA\IikoTransport\Tests\Entities\Organizations;

use KMA\IikoTransport\Enums\AddressFormatType;
use KMA\IikoTransport\Enums\DeliveryServiceType;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Organizations\OrganizationInfo;

/**
 * @covers \KMA\IikoTransport\Entities\Organizations\OrganizationInfo
 */
class OrganisationInfoExtendedTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Organizations/OrganizationsExtendedResponse',
        'path' => 'organizations'
    ];
    protected string $entityClass = OrganizationInfo::class;
    protected array $fields = [
        'responseType',
        'id',
        'name',
        'country',
        'restaurantAddress',
        'latitude',
        'longitude',
        'useUaeAddressingSystem',
        'version',
        'currencyIsoName',
        'currencyMinimumDenomination',
        'countryPhoneCode',
        'marketingSourceRequiredInDelivery',
        'defaultDeliveryCityId',
        'deliveryCityIds',
        'deliveryServiceType',
        'defaultCallCenterPaymentTypeId',
        'orderItemCommentEnabled',
        'inn',
        'addressFormatType',
        'isConfirmationEnabled',
        'confirmAllowedIntervalInMinutes',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertEquals('Extended', $entity->responseType);

        $this->assertIsString($entity->country);
        $this->assertIsString($entity->restaurantAddress);
        $this->assertIsFloat($entity->latitude);
        $this->assertIsFloat($entity->longitude);
        $this->assertIsBool($entity->useUaeAddressingSystem);
        $this->assertIsString($entity->version);
        $this->assertIsString($entity->currencyIsoName);
        $this->assertIsFloat($entity->currencyMinimumDenomination);
        $this->assertIsString($entity->countryPhoneCode);
        $this->assertIsBool($entity->marketingSourceRequiredInDelivery);
        $this->assertIsUuid($entity->defaultDeliveryCityId);
        $this->assertIsArray($entity->deliveryCityIds);
        $this->assertInstanceOf(DeliveryServiceType::class, $entity->deliveryServiceType);
        $this->assertIsUuid($entity->defaultCallCenterPaymentTypeId);
        $this->assertIsBool($entity->orderItemCommentEnabled);
        $this->assertIsString($entity->inn);
        $this->assertInstanceOf(AddressFormatType::class, $entity->addressFormatType);
        $this->assertIsBool($entity->isConfirmationEnabled);
        $this->assertIsInt($entity->confirmAllowedIntervalInMinutes);
    }
}
