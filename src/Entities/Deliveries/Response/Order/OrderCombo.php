<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

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
            $this->setRelatedFields($data);
            $this->amount = $data['amount'];
            $this->price = $data['price'];
            $this->sourceId = $data['sourceId'];
        }
    }
}
