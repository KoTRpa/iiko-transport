<?php

namespace KMA\IikoTransport\Entities\Menu;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo;
use KMA\IikoTransport\Entities\Common\Nomenclature\ProductInfo;
use KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo;
use KMA\IikoTransport\Entities\Common\Nomenclature\Size;
use KMA\IikoTransport\Entities\Entity;

class NomenclatureResponse extends Entity
{
    use HasCorrelationId;

    /**
     * Stock list group
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Nomenclature\ProductsGroupInfo>
     */
    public Collection $groups;

    /**
     * Menu item category
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Nomenclature\ProductCategoryInfo>
     */
    public Collection $productCategories;

    /**
     * Menu items and modifiers
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Nomenclature\ProductInfo>
     */
    public Collection $products;

    /**
     * Item sizes
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Nomenclature\Size>
     */
    public Collection $sizes;

    /**
     * @required
     * @var int Items list revision
     */
    public int $revision;

    /**
     * @param array|null $data
     */
    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];

            $this->groups =
                collect($data['groups'])
                    ->map(fn (array $item): ProductsGroupInfo => ProductsGroupInfo::fromArray($item));

            $this->productCategories =
                collect($data['productCategories'])
                    ->map(fn (array $item): ProductCategoryInfo => ProductCategoryInfo::fromArray($item));

            $this->products =
                collect($data['products'])
                    ->map(fn (array $item): ProductInfo => ProductInfo::fromArray($item));

            $this->sizes =
                collect($data['sizes'])
                    ->map(fn (array $item): Size => Size::fromArray($item));

            $this->revision = $data['revision'];
        }
    }
}
