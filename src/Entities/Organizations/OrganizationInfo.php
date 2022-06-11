<?php

namespace KMA\IikoTransport\Entities\Organizations;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Enums\AddressFormatType;
use KMA\IikoTransport\Enums\DeliveryServiceType;

/**
 * TODO: Extended Organization
 */
class OrganizationInfo extends Entity
{
    /**
     * @required
     * @var string Enum(Simple, Extended)
     */
    public string $responseType;

    /**
     * @required
     * @var string <uuid> Organization ID
     */
    public string $id;

    /**
     * @required
     * @var string Organization name
     */
    public string $name;

    /**
     * @required
     * @var null|string Country
     */
    public null|string $country;

    /**
     * @required
     * @var null|string Restaurant address
     */
    public null|string $restaurantAddress;

    /**
     * @required
     * @var float Latitude
     */
    public float $latitude;

    /**
     * @required
     * @var float Longitude
     */
    public float $longitude;

    /**
     * @required
     * @var bool Regional setting "Use the UAE Addressing System"
     */
    public bool $useUaeAddressingSystem;

    /**
     * @required
     * @var string iikoRms version
     */
    public string $version;

    /**
     * @required
     * @var null|string ISO currency code (for example: RUB, USD, EUR)
     */
    public null|string $currencyIsoName;

    /**
     * @required
     * @var null|float Value rounding of position
     */
    public null|float $currencyMinimumDenomination;

    /**
     * @required
     * @var null|string Country dialing code
     */
    public null|string $countryPhoneCode;

    /**
     * @required
     * @var null|bool Require mandatory marketing source input when creating a delivery
     */
    public null|bool $marketingSourceRequiredInDelivery;

    /**
     * @required
     * @var null|string <uuid> Default delivery city
     */
    public null|string $defaultDeliveryCityId;

    /**
     * @required
     * @var null|string[] [<uuid>] Delivery cities
     */
    public null|array $deliveryCityIds;

    /**
     * @required
     * @var null|\KMA\IikoTransport\Enums\DeliveryServiceType Delivery type
     * | Enum: "CourierOnly" "SelfServiceOnly" "CourierAndSelfService"
     */
    public null|DeliveryServiceType $deliveryServiceType;

    /**
     * @required
     * @var null|string <uuid> Default payment type for CallCenter
     */
    public null|string $defaultCallCenterPaymentTypeId;

    /**
     * @required
     * @var null|bool Allow text comments for order items (in all restaurant sections)
     */
    public null|bool $orderItemCommentEnabled;

    /**
     * @required
     * @var null|string Restaurant`s INN (Taxpayer Identification Number)
     */
    public null|string $inn;

    /**
     * @required
     * @var \KMA\IikoTransport\Enums\AddressFormatType Address format type
     * | Enum: "Legacy" "City" "International" "IntNoPostcode"
     */
    public AddressFormatType $addressFormatType;

    /**
     * @required
     * @var null|bool Determines whether to use delivery confirmation
     */
    public null|bool $isConfirmationEnabled;

    /**
     * @required
     * @var null|int Confirm orders time interval
     */
    public null|int $confirmAllowedIntervalInMinutes;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->responseType = $data['responseType'];
            $this->id = $data['id'];
            $this->name = $data['name'];

            if ($data['responseType'] === 'Extended') {
                $this->country = $data['country'];
                $this->restaurantAddress = $data['restaurantAddress'];
                $this->latitude = $data['latitude'];
                $this->longitude = $data['longitude'];
                $this->useUaeAddressingSystem = $data['useUaeAddressingSystem'];
                $this->version = $data['version'];
                $this->currencyIsoName = $data['currencyIsoName'];
                $this->currencyMinimumDenomination = $data['currencyMinimumDenomination'];
                $this->countryPhoneCode = $data['countryPhoneCode'];
                $this->marketingSourceRequiredInDelivery = $data['marketingSourceRequiredInDelivery'];
                $this->defaultDeliveryCityId = $data['defaultDeliveryCityId'];
                $this->deliveryCityIds = $data['deliveryCityIds'];
                $this->deliveryServiceType = DeliveryServiceType::from($data['deliveryServiceType']);
                $this->defaultCallCenterPaymentTypeId = $data['defaultCallCenterPaymentTypeId'];
                $this->orderItemCommentEnabled = $data['orderItemCommentEnabled'];
                $this->inn = $data['inn'];
                $this->addressFormatType = AddressFormatType::from($data['addressFormatType']);
                $this->isConfirmationEnabled = $data['isConfirmationEnabled'];
                $this->confirmAllowedIntervalInMinutes = $data['confirmAllowedIntervalInMinutes'];
            }
        }
    }
}
