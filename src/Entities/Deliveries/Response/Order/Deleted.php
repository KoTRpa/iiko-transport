<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted\DeletionMethod;
use KMA\IikoTransport\Entities\Entity;

class Deleted extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted\DeletionMethod Deletion method
     */
    public DeletionMethod $deletionMethod;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->deletionMethod = DeletionMethod::fromArray($data['deletionMethod']);
        }
    }
}
