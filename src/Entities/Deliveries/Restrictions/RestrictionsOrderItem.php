<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;

class RestrictionsOrderItem extends Entity
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

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItemModifier> Modifiers (absolute amount)
     */
    public Collection $modifiers;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->product = $data['product'];
            $this->amount = $data['amount'];
            $this->modifiers = collect($data['modifiers'] ?? [])->map(
                fn (array $item) => RestrictionsOrderItemModifier::fromArray($item)
            );
        }
    }
}
