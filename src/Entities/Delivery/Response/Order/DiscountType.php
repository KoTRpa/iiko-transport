<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class DiscountType extends Entity
{
    use HasRelationFields;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
        }
    }
}
