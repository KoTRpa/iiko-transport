<?php

namespace KMA\IikoTransport\Entities\Nomenclature;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;

class ProductInfo extends Entity
{
    /**
     * @var ?float|null
     */
    public ?float $fatAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $proteinsAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $carbohydratesAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $energyAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $fatFullAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $proteinsFullAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $carbohydratesFullAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $energyFullAmount = null;

    /**
     * @var ?float|null
     */
    public ?float $weight = null;

    /**
     * @var ?string|null <uuid> Stock list group in RMS
     */
    public ?string $groupId = null;

    /**
     * @var ?string|null <uuid> Product category in RMS
     */
    public ?string $productCategoryId = null;

    /**
     * @var ?string|null dish | good | modifier
     */
    public ?string $type = null;

    /**
     * @required
     * @var string Product or compound. Depends on modifiers scheme existence
     * | enum: "Product" "Compound"
     */
    public string $orderItemType;

    /**
     * @var ?string|null <uuid> Modifier schema's ID
     */
    public ?string $modifierSchemaId = null;

    /**
     * @var ?string|null Modifier schema's name
     */
    public ?string $modifierSchemaName = null;

    /**
     * @required
     * @var bool Is product splittable
     */
    public bool $splittable;

    /**
     * @required
     * @var string Item's unit of measurement
     */
    public string $measureUnit;

    /**
     * Prices
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Nomenclature\SizePrice>
     */
    public Collection $sizePrices;

    /**
     * Modifiers
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Nomenclature\SimpleModifierInfo>
     */
    public Collection $modifiers;

    /**
     * Modifier groups
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Nomenclature\GroupModifierInfo>
     */
    public Collection $groupModifiers;

    /**
     * @required
     * @var string[] Links to images
     */
    public array $imageLinks;

    /**
     * @required
     * @var bool Do not print on bill
     */
    public bool $doNotPrintInCheque;

    /**
     * @var ?string|null <uuid> External menu group
     */
    public ?string $parentGroup = null;

    /**
     * @required
     * @var int Product's order (priority) in menu
     */
    public int $order;

    /**
     * @var ?string|null Full name in a foreign language
     */
    public ?string $fullNameEnglish = null;

    /**
     * @required
     * @var bool Weighed product
     */
    public bool $useBalanceForSell;

    /**
     * @required
     * @var bool Open price
     */
    public bool $canSetOpenPrice;

    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @var ?string|null SKU
     */
    public ?string $code = null;

    /**
     * @required
     * @var string name
     */
    public string $name;

    /**
     * @var ?string|null description
     */
    public ?string $description = null;

    /**
     * @var ?string|null additionalInfo
     */
    public ?string $additionalInfo = null;

    /**
     * @var ?string[]|null Tags
     */
    public ?array $tags = null;

    /**
     * @required
     * @var bool Is-Deleted attribute
     */
    public bool $isDeleted;

    /**
     * @var ?string|null SEO description for client
     */
    public ?string $seoDescription = null;

    /**
     * @var ?string|null SEO text for robots
     */
    public ?string $seoText = null;

    /**
     * @var ?string|null SEO keywords
     */
    public ?string $seoKeywords = null;

    /**
     * @var ?string|null SEO header
     */
    public ?string $seoTitle = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->fatAmount = (isset($data['fatAmount'])) ? (float)$data['fatAmount'] : null;
            $this->proteinsAmount = (isset($data['proteinsAmount'])) ? (float)$data['proteinsAmount'] : null;
            $this->carbohydratesAmount = (isset($data['carbohydratesAmount'])) ? (float)$data['carbohydratesAmount'] : null;
            $this->energyAmount = (isset($data['energyAmount'])) ? (float)$data['energyAmount'] : null;
            $this->fatFullAmount = (isset($data['fatFullAmount'])) ? (float)$data['fatFullAmount'] : null;
            $this->proteinsFullAmount = (isset($data['proteinsFullAmount'])) ? (float)$data['proteinsFullAmount'] : null;
            $this->carbohydratesFullAmount = (isset($data['carbohydratesFullAmount'])) ? (float)$data['carbohydratesFullAmount'] : null;
            $this->energyFullAmount = (isset($data['energyFullAmount'])) ? (float)$data['energyFullAmount'] : null;
            $this->weight = (isset($data['weight'])) ? (float)$data['weight'] : null;
            $this->groupId = $data['groupId'] ?? null;
            $this->productCategoryId = $data['productCategoryId'] ?? null;
            $this->type = $data['type'] ?? null;
            $this->orderItemType = $data['orderItemType'];
            $this->modifierSchemaId = $data['modifierSchemaId'] ?? null;
            $this->modifierSchemaName = $data['modifierSchemaName'] ?? null;
            $this->splittable = $data['splittable'];
            $this->measureUnit = $data['measureUnit'];
            $this->sizePrices = collect($data['sizePrices'])->map(function (array $item): SizePrice {
                return SizePrice::fromArray($item);
            });
            $this->modifiers = collect($data['modifiers'])->map(function (array $item): SimpleModifierInfo {
                return SimpleModifierInfo::fromArray($item);
            });
            $this->groupModifiers = collect($data['groupModifiers'])->map(function (array $item): GroupModifierInfo {
                return GroupModifierInfo::fromArray($item);
            });
            $this->imageLinks = $data['imageLinks'];
            $this->doNotPrintInCheque = $data['doNotPrintInCheque'];
            $this->parentGroup = $data['parentGroup'] ?? null;
            $this->order = (isset($data['order'])) ? (int)$data['order'] : null;
            $this->fullNameEnglish = $data['fullNameEnglish'] ?? null;
            $this->useBalanceForSell = $data['useBalanceForSell'];
            $this->canSetOpenPrice = $data['canSetOpenPrice'];
            $this->id = $data['id'];
            $this->code = $data['code'] ?? null;
            $this->name = $data['name'];
            $this->description = $data['description'] ?? null;
            $this->additionalInfo = $data['additionalInfo'] ?? null;
            $this->tags = $data['tags'] ?? null;
            $this->isDeleted = $data['isDeleted'];
            $this->seoDescription = $data['seoDescription'] ?? null;
            $this->seoText = $data['seoText'] ?? null;
            $this->seoKeywords = $data['seoKeywords'] ?? null;
            $this->seoTitle = $data['seoTitle'] ?? null;
        }
    }
}
