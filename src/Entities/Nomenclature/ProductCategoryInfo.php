<?php

namespace KMA\IikoTransport\Entities\Nomenclature;

use KMA\IikoTransport\Entities\Entity;

class ProductCategoryInfo extends Entity
{
    /**
     * @required
     * @var string <uuid> Product category ID
     */
    public string $id;

    /**
     * @required
     * @var string Name
     */
    public string $name;

    /**
     * @required
     * @var bool Is deleted attribute
     */
    public bool $isDeleted;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->isDeleted = $data['isDeleted'];
        }
    }
}
