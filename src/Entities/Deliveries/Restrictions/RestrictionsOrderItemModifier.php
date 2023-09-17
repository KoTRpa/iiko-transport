<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class RestrictionsOrderItemModifier extends Entity
{
    /**
     * @required
     * @var string <uuid> Product ID
     */
    public string $id;

    /**
     * @required
     * @var string Product
     */
    public string $product;

    /**
     * @required
     * @var float Amount
     */
    public float $amount;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->product = $data['product'];
            $this->amount = $data['amount'];
        }
    }
}
