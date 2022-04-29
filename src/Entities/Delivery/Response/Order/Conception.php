<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

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
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->code = $data['code'];
        }
    }
}
