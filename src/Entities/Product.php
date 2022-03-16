<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;
use KMA\IikoTransport\Enums\OrderItemType;
use KMA\IikoTransport\Enums\ProductType;

class Product
{
    use Jsonable;

    /**
     * @var float|null Fat per 100g
     */
    public ?float $fatAmount = null;

    /**
     * @var float|null Protein per 100g
     */
    public ?float $proteinsAmount = null;

    /**
     * @var float|null Carbohydrate per 100g
     */
    public ?float $carbohydratesAmount = null;

    /**
     * @var float|null Calories per 100g
     */
    public ?float $energyAmount = null;

    /**
     * @var float|null Fat per item
     */
    public ?float $fatFullAmount = null;

    /**
     * @var float|null Protein per item
     */
    public ?float $proteinsFullAmount = null;

    /**
     * @var float|null Carbohydrate per item
     */
    public ?float $carbohydratesFullAmount = null;

    /**
     * @var float|null Calories per item
     */
    public ?float $energyFullAmount = null;

    /**
     * @var float|null Item weight
     */
    public ?float $weight = null;

    /**
     * @var string|null <uuid> Stock list group in RMS
     */
    public ?string $groupId = null;

    /**
     * @var string|null <uuid> Product category in RMS
     */
    public ?string $productCategoryId = null;

    /**
     * @var \KMA\IikoTransport\Enums\ProductType|null dish | good | modifier
     */
    public ?ProductType $type = null;

    /**
     * @var \KMA\IikoTransport\Enums\OrderItemType Product | Compound
     */
    public OrderItemType $orderItemType;

    /**
     * @var string|null <uuid> Modifier schema's ID
     */
    public ?string $modifierSchemaId = null;

    /**
     * @var string|null <uuid> Modifier schema's name
     */
    public ?string $modifierSchemaName = null;

    /**
     * @var bool Is product splittable
     */
    public bool $splittable;

    /**
     * @var string Item's unit of measurement
     */
    public string $measureUnit;

    /**
     * @var \KMA\IikoTransport\Entities\SizePrice[] Prices
     */
    public array $sizePrices = [];

    /**
     * @var \KMA\IikoTransport\Entities\Modifier[] Modifiers
     */
    public ?array $modifiers = [];

    /**
     * @var \KMA\IikoTransport\Entities\GroupModifier[] Modifier groups
     */
    public array $groupModifiers = [];

    /**
     * @var string[] Links to images
     */
    public array $imageLinks = [];

    /**
     * @var bool Do not print on bill
     */
    public bool $doNotPrintInCheque;

    /**
     * @var string|null <uuid> External menu group
     */
    public ?string $parentGroup = null;

    /**
     * @var int Product's order (priority) in menu
     */
    public int $order;

    /**
     * @var string|null Full name in a foreign language
     */
    public ?string $fullNameEnglish = null;

    /**
     * @var bool Weighed product
     */
    public bool $useBalanceForSell;

    /**
     * @var bool Open price
     */
    public bool $canSetOpenPrice;

    /**
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @var string|null SKU
     */
    public ?string $code = null;

    /**
     * @var string Name
     */
    public string $name;

    /**
     * @var string|null Description
     */
    public ?string $description = null;

    /**
     * @var string|null Additional information
     */
    public ?string $additionalInfo = null;

    /**
     * @var string[]|null Tags
     */
    public ?array $tags = null;

    /**
     * @var bool Is-Deleted attribute
     */
    public bool $isDeleted;

    /**
     * @var string|null SEO description for client.
     */
    public ?string $seoDescription = null;

    /**
     * @var string|null SEO text for robots
     */
    public ?string $seoText = null;

    /**
     * @var string|null SEO keywords
     */
    public ?string $seoKeywords = null;

    /**
     * @var string|null SEO header
     */
    public ?string $seoTitle = null;
}
