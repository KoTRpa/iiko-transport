<?php

namespace KMA\IikoTransport\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Entity;

class Card extends Entity
{
    /**
     * @required
     * @var string Track of discount card to be applied to order.
     */
    public string $track;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->track = $data['track'];
        }
    }
}
