<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Entity;

class DeliveryPoint extends Entity
{
    /**
     * @var \KMA\IikoTransport\Entities\Common\Coordinates|null Delivery address coordinates
     */
    public ?Coordinates $coordinates = null;

    /**
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\Address|null Order delivery address
     */
    public ?Address $address = null;

    /**
     * @var string|null Address ID in external mapping system
     */
    public ?string $externalCartographyId = null;

    /**
     * @var string|null comment
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
