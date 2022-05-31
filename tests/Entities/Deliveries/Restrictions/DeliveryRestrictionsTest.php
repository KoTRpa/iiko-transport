<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictionItem;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictions;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZone;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictions
 */
class DeliveryRestrictionsTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RestrictionsResponse',
        'path' => 'deliveryRestrictions'
    ];
    protected string $entityClass = DeliveryRestrictions::class;
    protected array $fields = [
        'organizationId',
        'deliveryGeocodeServiceType',
        'deliveryRegionsMapUrl',
        'defaultDeliveryDurationInMinutes',
        'defaultSelfServiceDurationInMinutes',
        'useSameDeliveryDuration',
        'useSameMinSum',
        'defaultMinSum',
        'useSameWorkTimeInterval',
        'defaultFrom',
        'defaultTo',
        'useSameRestrictionsOnAllWeek',
        'restrictions',
        'deliveryZones',
        'rejectOnGeocodingError',
        'addDeliveryServiceCost',
        'useSameDeliveryServiceProduct',
        'defaultDeliveryServiceProductId',
        'useExternalAssignationService',
        'frontTrustsCallCenterCheck',
        'externalAssignationServiceUrl',
        'requireExactAddressForGeocoding',
        'zonesMode',
        'autoAssignExternalDeliveries',
        'actionOnValidationRejection',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsInt($entity->deliveryGeocodeServiceType);
        $this->assertIsString($entity->deliveryRegionsMapUrl);
        $this->assertIsInt($entity->defaultDeliveryDurationInMinutes);
        $this->assertIsInt($entity->defaultSelfServiceDurationInMinutes);
        $this->assertIsBool($entity->useSameDeliveryDuration);
        $this->assertIsBool($entity->useSameMinSum);
        $this->assertIsFloat($entity->defaultMinSum);
        $this->assertIsBool($entity->useSameWorkTimeInterval);
        $this->assertIsInt($entity->defaultFrom);
        $this->assertIsInt($entity->defaultTo);
        $this->assertIsBool($entity->useSameRestrictionsOnAllWeek);
        $this->assertInstanceOf(Collection::class, $entity->restrictions);
        $entity->restrictions->each(function ($item): void {
            $this->assertInstanceOf(DeliveryRestrictionItem::class, $item);
        });
        $this->assertInstanceOf(Collection::class, $entity->deliveryZones);
        $entity->deliveryZones->each(function ($item): void {
            $this->assertInstanceOf(DeliveryZone::class, $item);
        });
        $this->assertIsBool($entity->rejectOnGeocodingError);
        $this->assertIsBool($entity->addDeliveryServiceCost);
        $this->assertIsBool($entity->useSameDeliveryServiceProduct);
        $this->assertIsString($entity->defaultDeliveryServiceProductId);
        $this->assertIsBool($entity->useExternalAssignationService);
        $this->assertIsBool($entity->frontTrustsCallCenterCheck);
        $this->assertIsString($entity->externalAssignationServiceUrl);
        $this->assertIsBool($entity->requireExactAddressForGeocoding);
        $this->assertIsInt($entity->zonesMode);
        $this->assertIsBool($entity->autoAssignExternalDeliveries);
        $this->assertIsInt($entity->actionOnValidationRejection);
    }
}
