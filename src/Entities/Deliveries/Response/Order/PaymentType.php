<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

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
            $this->setRelatedFields($data);
            $this->kind = $data['kind'];
        }
    }
}
