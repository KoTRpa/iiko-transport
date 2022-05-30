<?php

namespace KMA\IikoTransport\Entities\Discounts;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Enums\DiscountMode;

class DiscountCardTypeInfo extends Entity
{
    /**
     * @required
     * @var string <uuid> Discount ID in RMS
     */
    public string $id;

    /**
     * @required
     * @var string Discount name
     */
    public string $name;

    /**
     * @required
     * @var float Total discount rate
     * | Ignored if "isCategorisedDiscount" specified
     */
    public float $percent;

    /**
     * @required
     * @var bool Whether it is category discount or not
     * | If true, "productCategoryDiscounts" discounts will apply
     */
    public bool $isCategorisedDiscount;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Discounts\ProductCategoryDiscount> Category discount
     */
    public Collection $productCategoryDiscounts;

    /**
     * @var string|null Comment
     */
    public ?string $comment = null;

    /**
     * @required
     * @var bool Whether discount allows for selected application to individual items at user's discretion
     */
    public bool $canBeAppliedSelectively;

    /**
     * @var float|null Minimum order amount required for discount application
     * If order amount is less than specified threshold, discount does not apply
     */
    public ?float $minOrderSum = null;

    /**
     * @required
     * @var DiscountMode Discount type
     * | Enum: "Percent" "FlexibleSum" "FixedSum"
     * | Can be obtained by /api/1/discounts operation
     */
    public DiscountMode $mode;

    /**
     * @required
     * @var float Fixed amount
     * Triggers if fixed amount has been specified
     */
    public float $sum;

    /**
     * @required
     * @var bool Can be applied by card No
     * If true, it's enough to enter discount card No. (card swiping not required)
     */
    public bool $canApplyByCardNumber;

    /**
     * @required
     * @var bool Created manually
     */
    public bool $isManual;

    /**
     * @required
     * @var bool Executed by card
     */
    public bool $isCard;

    /**
     * @required
     * @var bool Created automatically
     */
    public bool $isAutomatic;

    /**
     * @required
     * @var bool IsDeleted
     */
    public bool $isDeleted;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->percent = $data['percent'];
            $this->isCategorisedDiscount = $data['isCategorisedDiscount'];
            $this->productCategoryDiscounts =
                collect($data['productCategoryDiscounts'])
                    ->map(fn(array $item): ProductCategoryDiscount => ProductCategoryDiscount::fromArray($item));
            $this->comment = $data['comment'] ?? null;
            $this->canBeAppliedSelectively = $data['canBeAppliedSelectively'];
            $this->minOrderSum = $data['minOrderSum'] ?? null;
            $this->mode = DiscountMode::from($data['mode']);
            $this->sum = $data['sum'];
            $this->canApplyByCardNumber = $data['canApplyByCardNumber'];
            $this->isManual = $data['isManual'];
            $this->isCard = $data['isCard'];
            $this->isAutomatic = $data['isAutomatic'];
            $this->isDeleted = $data['isDeleted'];
        }
    }
}
