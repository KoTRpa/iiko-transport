<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

class Operator extends Entity
{
    use HasRelationFields;

    /**
     * @var string|null Phone
     */
    public ?string $phone = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->setRelatedFields($data);
            $this->phone = $data['phone'] ?? null;
        }
    }
}
