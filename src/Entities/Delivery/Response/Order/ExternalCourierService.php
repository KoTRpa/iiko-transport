<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class ExternalCourierService extends Entity
{
    /**
     * @required
     * @var string ECS setting record id. Unique through all organizations
     */
    public string $id;

    /**
     * @required
     * @var string ECS name.
     */
    public string $name;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
        }
    }
}
