<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class OrderItemModifier extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderItemProduct Item
     */
    public OrderItemProduct $product;

    /**
     * @required
     * @var float Quantity
     */
    public float $amount;

    /**
     * @required
     * @var bool Whether quantity of modifier depends on quantity of item
     */
    public bool $amountIndependentOfParentAmount;

    /**
     * @var null|\KMA\IikoTransport\Entities\Deliveries\Response\Order\ProductGroup Group of modifiers (in case of a group modifier)
     */
    public ?ProductGroup $productGroup;

    /**
     * @required
     * @var float Price per item unit. Can be sent different from the price in RMS.
     */
    public float $price;

    /**
     * @required
     * @var bool Whether price is predefined
     */
    public bool $pricePredefined;

    /**
     * @required
     * @var float Total amount per item including tax, discounts/surcharges
     */
    public float $resultSum;

    /**
     * @var null|\KMA\IikoTransport\Entities\Deliveries\Response\Order\Deleted Item deletion details. If filled up, item is deleted.
     */
    public ?Deleted $deleted = null;

    /**
     * @var string|null <uuid> Unique identifier of the item in the order and for the whole system
     */
    public ?string $positionId = null;

    /**
     * @var int|null Default amount
     */
    public ?int $defaultAmount = null;

    /**
     * @var bool|null Hide modifier in UI if "amount" equals "defaultAmount".
     */
    public ?bool $hideIfDefaultAmount;

    /**
     * @var float|null Tax rate
     */
    public ?float $taxPercent = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->product = OrderItemProduct::fromArray($data['product']);
            $this->amount = $data['amount'];
            $this->amountIndependentOfParentAmount = $data['amountIndependentOfParentAmount'];
            $this->productGroup = ProductGroup::fromArray($data['productGroup']);
            $this->price = $data['price'];
            $this->pricePredefined = $data['pricePredefined'];
            $this->resultSum = $data['resultSum'];
            $this->deleted = isset($data['deleted']) ? Deleted::fromArray($data['deleted']) : null;
            $this->positionId = $data['positionId'] ?? null;
            $this->defaultAmount = $data['defaultAmount'] ?? null;
            $this->hideIfDefaultAmount = $data['hideIfDefaultAmount'] ?? null;
            $this->taxPercent = $data['taxPercent'] ?? null;
        }
    }
}
