<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use Illuminate\Support\Collection;

class OrderItem extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItemProduct Item
     */
    public OrderItemProduct $product;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItemModifier> Modifiers
     */
    public ?Collection $modifiers;

    /**
     * @required
     * @var float Price per item unit. Can be sent different from the price in the base menu
     */
    public float $price;

    /**
     * @required
     * @var float Total amount per item including tax, discounts/surcharges
     */
    public float $cost;

    /**
     * @required
     * @var bool Whether price is predefined
     */
    public bool $pricePredefined;

    /**
     * @var string|null <uuid> Unique identifier of the item in the order and for the whole system
     */
    public ?string $positionId = null;

    /**
     * @var float|null Tax rate
     */
    public ?float $taxPercent = null;

    /**
     * @required
     * @var string type
     */
    public string $type = 'Product';

    /**
     * @required
     * @var string Item cooking status
     * Enum: "Added" "PrintedNotCooking" "CookingStarted" "CookingCompleted" "Served"
     */
    public string $status;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted Item deletion details. If filled up, item is deleted.
     */
    public ?Deleted $deleted = null;

    /**
     * @required
     * @var float Quantity
     */
    public float $amount;

    /**
     * @var string|null Comment
     */
    public ?string $comment = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Printing time (Local for the terminal)
     */
    public ?string $whenPrinted = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\Size Size
     */
    public ?Size $size = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\ComboInformation Size
     */
    public ?ComboInformation $comboInformation = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->product = OrderItemProduct::fromArray($data['product']);
            $this->modifiers = isset($data['modifiers'])
                ? collect($data['modifiers'])->map(function (array $m) {
                      return OrderItemModifier::fromArray($m);
                  })
                : null;
            $this->price = $data['price'];
            $this->cost = $data['cost'];
            $this->pricePredefined = $data['pricePredefined'];
            $this->positionId = $data['positionId'] ?? null;
            $this->taxPercent = $data['taxPercent'] ?? null;
            $this->type = $data['type'];
            $this->status = $data['status'];
            $this->deleted = Deleted::fromArray($data['deleted']);
            $this->amount = $data['amount'];
            $this->comment = $data['comment'] ?? null;
            $this->whenPrinted = $data['whenPrinted'] ?? null;
            $this->size = isset($data['size'])
                ? Size::fromArray($data['size'])
                : null;
            $this->comboInformation = isset($data['comboInformation'])
                ? ComboInformation::fromArray($data['comboInformation'])
                : null;
        }
    }
}
