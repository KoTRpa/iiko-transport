<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted\DeletionMethod;

class Deleted extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted\DeletionMethod Deletion method
     */
    public DeletionMethod $deletionMethod;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->deletionMethod = DeletionMethod::fromArray($data['deletionMethod']);
        }
    }
}
