<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class Address extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\Street Street
     */
    public Street $street;

    /**
     * @var string|null Postcode
     */
    public ?string $index = null;

    /**
     * @required
     * @var string|null House
     * [ 0..100 ] characters
     * In case useUaeAddressingSystem enabled max length - 100, otherwise - 10
     */
    public ?string $house;

    /**
     * @var string|null Building
     */
    public ?string $building = null;

    /**
     * @var string|null Apartment
     * [ 0..100 ] characters
     * In case useUaeAddressingSystem enabled max length - 100, otherwise - 10
     */
    public ?string $flat = null;

    /**
     * @var string|null Entrance
     * [ 0..10 ] characters
     */
    public ?string $entrance = null;

    /**
     * @var string|null Floor
     * [ 0..10 ] characters
     */
    public ?string $floor = null;

    /**
     * @var string|null Intercom
     * [ 0..10 ] characters
     */
    public ?string $doorphone = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\Region Region
     */
    public Region $region;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->street = Street::fromArray($data['street']);
            $this->index = $data['index'] ?? null;
            $this->house = $data['house'];
            $this->building = $data['building'] ?? null;
            $this->flat = $data['flat'] ?? null;
            $this->entrance = $data['entrance'] ?? null;
            $this->floor = $data['floor'] ?? null;
            $this->doorphone = $data['doorphone'] ?? null;
            $this->region = Region::fromArray($data['region']);
        }
    }
}
