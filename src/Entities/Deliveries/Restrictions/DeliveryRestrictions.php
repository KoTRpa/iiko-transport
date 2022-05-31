<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;

class DeliveryRestrictions extends Entity
{
    /**
     * @required
     * @var string <uuid> Organization ID
     * | Can be obtained by `/api/1/organizations` operation
     */
    public string $organizationId;

    /**
     * @required
     * @var int Geocoding service type
     * | Enum: 1 2 3 4
     */
    public int $deliveryGeocodeServiceType;

    /**
     * @required
     * @var string|null Link to the map of delivery service regions
     */
    public string|null $deliveryRegionsMapUrl;

    /**
     * @required
     * @var int General standard of delivery time
     */
    public int $defaultDeliveryDurationInMinutes;

    /**
     * @required
     * @var int Default pickup time
     */
    public int $defaultSelfServiceDurationInMinutes;

    /**
     * @required
     * @var bool Indication that all delivery points in all delivery zones use common delivery time limits
     */
    public bool $useSameDeliveryDuration;

    /**
     * @required
     * @var bool Indication that all delivery points for all delivery zones use the total minimum order amount
     */
    public bool $useSameMinSum;

    /**
     * @required
     * @var float|null Total minimum order amount
     */
    public float|null $defaultMinSum;

    /**
     * @required
     * @var bool Indication that all delivery points in all zones use common time limits
     */
    public bool $useSameWorkTimeInterval;

    /**
     * @required
     * @var int|null The beginning of the interval of the total work time for all points and delivery zones, in minutes from the beginning of the day.
     */
    public int|null $defaultFrom;

    /**
     * @required
     * @var int|null End of the total work time interval for all points and delivery zones, in minutes from the beginning of the day
     */
    public int|null $defaultTo;

    /**
     * @required
     * @var bool Indication that all delivery points in all zones use the same schedule for all days of the week
     */
    public bool $useSameRestrictionsOnAllWeek;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictionItem>
     * Restrictions
     */
    public Collection $restrictions;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZone>
     * Delivery zones
     */
    public Collection $deliveryZones;

    /**
     * @required
     * @var bool Reject delivery if we could not geocode the address
     */
    public bool $rejectOnGeocodingError;

    /**
     * @required
     * @var bool Add shipping cost to order
     */
    public bool $addDeliveryServiceCost;

    /**
     * @required
     * @var bool Indication that the cost is the same for all points of delivery
     */
    public bool $useSameDeliveryServiceProduct;

    /**
     * @required
     * @var string|null <uuid> Link to "delivery service payment"
     */
    public string|null $defaultDeliveryServiceProductId;

    /**
     * @required
     * @var bool Use external delivery distribution service
     */
    public bool $useExternalAssignationService;

    /**
     * @required
     * @var bool Indication whether to trust on the fronts the call center mapping restrictions
     * from the call center if the composition of the order has not changed since the last check.
     * If true, then trust
     */
    public bool $frontTrustsCallCenterCheck;

    /**
     * @required
     * @var string|null Address of external delivery distribution service
     */
    public string|null $externalAssignationServiceUrl;

    /**
     * @required
     * @var bool Require an exact geocoding address
     */
    public bool $requireExactAddressForGeocoding;

    /**
     * @required
     * @var int Delivery restrictions mode
     * | Enum: 1 2
     */
    public int $zonesMode;

    /**
     * @required
     * @var bool Automatically assigned delivery method based on cartography
     */
    public bool $autoAssignExternalDeliveries;

    /**
     * @required
     * @var int Action on problems with auto-assignment
     * | Enum: 1 2
     */
    public int $actionOnValidationRejection;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationId = $data['organizationId'];
            $this->deliveryGeocodeServiceType = $data['deliveryGeocodeServiceType'];
            $this->deliveryRegionsMapUrl = $data['deliveryRegionsMapUrl'];
            $this->defaultDeliveryDurationInMinutes = $data['defaultDeliveryDurationInMinutes'];
            $this->defaultSelfServiceDurationInMinutes = $data['defaultSelfServiceDurationInMinutes'];
            $this->useSameDeliveryDuration = $data['useSameDeliveryDuration'];
            $this->useSameMinSum = $data['useSameMinSum'];
            $this->defaultMinSum = $data['defaultMinSum'];
            $this->useSameWorkTimeInterval = $data['useSameWorkTimeInterval'];
            $this->defaultFrom = $data['defaultFrom'];
            $this->defaultTo = $data['defaultTo'];
            $this->useSameRestrictionsOnAllWeek = $data['useSameRestrictionsOnAllWeek'];
            $this->restrictions =
                collect($data['restrictions'])
                    ->map(fn (array $item): DeliveryRestrictionItem => DeliveryRestrictionItem::fromArray($item));
            $this->deliveryZones =
                collect($data['deliveryZones'])
                    ->map(fn (array $item): DeliveryZone => DeliveryZone::fromArray($item));
            $this->rejectOnGeocodingError = $data['rejectOnGeocodingError'];
            $this->addDeliveryServiceCost = $data['addDeliveryServiceCost'];
            $this->useSameDeliveryServiceProduct = $data['useSameDeliveryServiceProduct'];
            $this->defaultDeliveryServiceProductId = $data['defaultDeliveryServiceProductId'];
            $this->useExternalAssignationService = $data['useExternalAssignationService'];
            $this->frontTrustsCallCenterCheck = $data['frontTrustsCallCenterCheck'];
            $this->externalAssignationServiceUrl = $data['externalAssignationServiceUrl'];
            $this->requireExactAddressForGeocoding = $data['requireExactAddressForGeocoding'];
            $this->zonesMode = $data['zonesMode'];
            $this->autoAssignExternalDeliveries = $data['autoAssignExternalDeliveries'];
            $this->actionOnValidationRejection = $data['actionOnValidationRejection'];
        }
    }
}
