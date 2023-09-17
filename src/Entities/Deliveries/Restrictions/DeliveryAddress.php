<?php declare(strict_types=1);

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class DeliveryAddress extends Entity
{
    /**
     * @var null|string City
     */
    public ?string $city;

    /**
     * @var null|string Street
     */
    public ?string $streetName;

    /**
     * @var null|string <uuid>Street Id
     */
    public ?string $streetId;

    /**
     * @var null|string House
     */
    public ?string $house;

    /**
     * @var null|string Building
     */
    public ?string $building;

    /**
     * @var null|string Post zip
     */
    public ?string $index;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->city = $data['city'] ?? null;
            $this->streetName = $data['streetName'] ?? null;
            $this->streetId = $data['streetId'] ?? null;
            $this->house = $data['house'] ?? null;
            $this->building = $data['building'] ?? null;
            $this->index = $data['index'] ?? null;
        }
    }
}
