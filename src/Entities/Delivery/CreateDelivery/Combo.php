<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class Combo extends Entity
{
    /**
     * @required
     * @var string <uuid> Combo ID
     */
    public string $id;

    /**
     * @required
     * @var string Name of combo
     */
    public string $name;

    /**
     * @required
     * @var int Quantity
     */
    public int $amount;

    /**
     * @required
     * @var float Price of one combo
     */
    public float $price;

    /**
     * @required
     * @var string <uuid> Combo validity ID
     */
    public string $sourceId;

    /**
     * @var string|null iikoCard program ID
     * Allowed from version 7.6.1
     */
    public ?string $programId = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->amount = (int)$data['amount'];
            $this->price = (float)$data['price'];
            $this->sourceId = $data['sourceId'];
            $this->programId = $data['programId'] ?? null;
        }
    }
}
