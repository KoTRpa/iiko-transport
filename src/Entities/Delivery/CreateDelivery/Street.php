<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class Street extends Entity
{
    /**
     * @var string|null Street ID in classifier, e.g., address database
     * string [ 0..255 ] characters
     */
    public ?string $classifierId = null;

    /**
     * @var string|null <uuid> ID
     * Can be obtained by /api/1/streets/by_city operation
     */
    public ?string $id = null;

    /**
     * @var string|null Name
     * string [ 0..60 ] characters Nullable
     */
    public ?string $name = null;

    /**
     * @var string|null City name
     * string [ 0..60 ] characters Nullable
     */
    public ?string $city = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->classifierId = $data['classifierId'] ?? null;
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? null;
            $this->city = $data['city'] ?? null;
        }
    }
}
