<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

class ProductGroup extends Entity
{
    use HasRelationFields;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->setRelatedFields($data);
        }
    }
}
