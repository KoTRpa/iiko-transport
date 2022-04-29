<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class DiscountItem extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\DiscountType Discount type
     * Can be obtained by `/api/1/discounts` operation
     */
    public DiscountType $discountType;

    /**
     * @required
     * @var float Total
     */
    public float $sum;

    /**
     * @var string[]|null <uuid>[] Order item positions
     * | Allowed from version 7.6.3
     */
    public ?array $selectivePositions = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->discountType = DiscountType::fromArray($data['discountType']);
            $this->sum = $data['sum'];
            $this->selectivePositions = $data['selectivePositions'];
        }
    }
}
