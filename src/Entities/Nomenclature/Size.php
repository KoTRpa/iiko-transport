<?php

namespace KMA\IikoTransport\Entities\Nomenclature;

use KMA\IikoTransport\Entities\Entity;

class Size extends Entity
{
    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @required
     * @var string Name
     */
    public string $name;

    /**
     * @var int|null Priority (serial number) of the size in the size scale
     */
    public ?int $priority = null;

    /**
     * @required
     * @var bool|null Is the default size in the size scale
     */
    public ?bool $isDefault = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->priority = isset($data['priority']) ? (int)$data['priority'] : null;
            $this->isDefault = $data['isDefault'] ?? null;
        }
    }
}
