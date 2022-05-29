<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

class Conception extends Entity
{
    use HasRelationFields;

    /**
     * @required
     * @var string Code
     */
    public string $code;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->setRelatedFields($data);
            $this->code = $data['code'];
        }
    }
}
