<?php

namespace KMA\IikoTransport\Entities\Discounts;

use KMA\IikoTransport\Entities\Entity;

class ProductCategoryDiscount extends Entity
{
    /**
     * @required
     * @var string <uuid> Category ID
     */
    public string $categoryId;

    /**
     * @required
     * @var string Category name
     */
    public string $categoryName;

    /**
     * @required
     * @var float This category discount %
     */
    public float $percent;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->categoryId = $data['categoryId'];
            $this->categoryName = $data['categoryName'];
            $this->percent = $data['percent'];
        }
    }
}
