<?php

namespace KMA\IikoTransport\Entities;


class Nomenclature
{
    /**
     * @var string <uuid> Operation ID
     */
    public string $correlationId;

    /**
     * @var \KMA\IikoTransport\Entities\Group[] Groups
     */
    public array $groups;

    /**
     * @var \KMA\IikoTransport\Entities\ProductCategory[] Menu item category
     */
    public array $productCategories;

    /**
     * @var \KMA\IikoTransport\Entities\Product[] Menu items and modifiers
     */
    public array $products;

    /**
     * @var \KMA\IikoTransport\Entities\Size[] Item sizes
     */
    public array $sizes = [];

    /**
     * @var int Items list revision
     */
    public int $revision;
}
