<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class Problem extends Entity
{
    /**
     * @required
     * @var bool Has problem
     */
    public bool $hasProblem;

    /**
     * @var string|null Problem description
     */
    public ?string $description = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->hasProblem = $data['hasProblem'];
            $this->description = $data['description'] ?? null;
        }
    }
}
