<?php

namespace KMA\IikoTransport\Entities;

class DeliveryPoint extends Entity
{
    /**
     * @var \KMA\IikoTransport\Entities\Coordinates|null Delivery address coordinates
     * Allowed from version 7.7.3
     */
    public ?Coordinates $coordinates = null;

    /**
     * @var \KMA\IikoTransport\Entities\Address|null Order delivery address
     */
    public ?Address $address = null;

    /**
     * @var string|null Delivery location custom code in customer's API system.
     * [0..100] characters
     */
    public ?string $externalCartographyId = null;

    /**
     * @var string|null Additional information
     * [0..500] characters
     */
    public ?string $comment = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->coordinates = isset($data['coordinates'])
                ? Coordinates::fromArray($data['coordinates'])
                : null;

            $this->address = isset($data['address'])
                ? Address::fromArray($data['address'])
                : null;

            $this->externalCartographyId = $data['externalCartographyId'] ?? null;
            $this->comment = $data['comment'] ?? null;
        }
    }
}
