<?php

namespace KMA\IikoTransport\Entities;

class Address
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Street Street
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
     * @var string|null <uuid> Delivery area ID
     */
    public ?string $regionId = null;
}
