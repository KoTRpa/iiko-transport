<?php

namespace KMA\IikoTransport\Entities;

class Price
{
    /**
     * @var float Current price
     */
    public float $currentPrice;

    /**
     * @var bool Is on the menu
     */
    public bool $isIncludedInMenu;

    /**
     * @var float|null New price
     */
    public ?float $nextPrice = null;

    /**
     * @var bool Will be on the menu in the future
     */
    public bool $nextIncludedInMenu;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> New price validity start date.
     */
    public ?string $nextDatePrice = null;
}
