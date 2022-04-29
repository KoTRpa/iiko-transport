<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class OrderCombo extends Entity
{
    use HasRelationFields;

    /**
     * @required
     * @var int Number of combos
     */
    public int $amount;

    /**
     * @required
     * @var float Price of combo. Given for 1 combo, without regard to amount
     */
    public float $price;

    /**
     * @required
     * @var string <uuid> Combo action ID
     */
    public string $sourceId;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->amount = $data['amount'];
            $this->price = $data['price'];
            $this->sourceId = $data['sourceId'];
        }
    }
}
