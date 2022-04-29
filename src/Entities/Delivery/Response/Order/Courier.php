<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class Courier extends Entity
{
    use HasRelationFields;

    /**
     * @var string|null Phone
     */
    public ?string $phone = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->phone = $data['phone'] ?? null;
        }
    }
}
