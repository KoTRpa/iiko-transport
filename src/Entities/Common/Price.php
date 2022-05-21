<?php

namespace KMA\IikoTransport\Entities\Common;

use KMA\IikoTransport\Entities\Entity;

class Price extends Entity
{
    /**
     * @required
     * @var float Current price
     */
    public float $currentPrice;

    /**
     * @required
     * @var bool Is on the menu
     */
    public bool $isIncludedInMenu;

    /**
     * @var float|null New price
     */
    public ?float $nextPrice = null;

    /**
     * @required
     * @var bool Will be on the menu in the future
     */
    public bool $nextIncludedInMenu;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> New price validity start date.
     */
    public ?string $nextDatePrice = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->currentPrice = (float)$data['currentPrice'];
            $this->isIncludedInMenu = $data['isIncludedInMenu'];
            $this->nextPrice = isset($data['nextPrice']) ? (float)$data['nextPrice'] : null;
            $this->nextIncludedInMenu = $data['nextIncludedInMenu'];
            $this->nextDatePrice = $data['nextDatePrice'] ?? null;
        }
    }
}
