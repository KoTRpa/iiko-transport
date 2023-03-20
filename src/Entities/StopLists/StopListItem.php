<?php

namespace KMA\IikoTransport\Entities\StopLists;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

class StopListItem extends Entity
{
    /**
     * @required
     * @var float Product balance
     */
    public float $balance;

    /**
     * @required
     * @var string <uuid> Out-of-stock list product ID
     */
    public string $productId;

    /**
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     */
    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            if (!isset($data['balance'])) {
                throw new MissingRequiredFieldException('balance');
            }
            if (!isset($data['productId'])) {
                throw new MissingRequiredFieldException('productId');
            }
            $this->balance = $data['balance'];
            $this->productId = $data['productId'];
        }
    }

}