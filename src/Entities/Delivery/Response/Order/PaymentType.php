<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class PaymentType extends Entity
{
    use HasRelationFields;

    /**
     * @required
     * @var string Payment type classifier.
     * Enum: "Unknown" "Cash" "Card" "Credit" "Writeoff" "Voucher" "External" "SmartSale" "Sberbank" "Trpos"
     */
    public string $kind;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->kind = $data['kind'];
        }
    }
}
