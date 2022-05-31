<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class DeliveryZoneAddressBinding extends Entity
{
    /**
     * @required
     * @var string <uuid> ID of the delivery zone's street
     */
    public string $streetId;

    /**
     * @required
     * @var string Postcode
     */
    public string $postcode;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Restrictions\Houses
     * Range of house numbers in the delivery zone
     */
    public Houses $houses;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->streetId = $data['streetId'];
            $this->postcode = $data['postcode'];
            $this->houses = Houses::fromArray($data['houses']);
        }
    }
}
