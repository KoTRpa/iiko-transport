<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

class Modifier
{
    use Jsonable;

    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @var int|null Default quantity
     */
    public ?int $defaultAmount = null;

    /**
     * @required
     * @var int Minimum quantity
     */
    public int $minAmount;

    /**
     * @required
     * @var int Maximum quantity
     */
    public int $maxAmount;

    /**
     * @var bool|null Required availability
     */
    public ?bool $required = null;

    /**
     * @var bool|null Hide if default amount applied
     * This field is supported since 7.2.4 iikoRMS version.
     */
    public ?bool $hideIfDefaultAmount = null;

    /**
     * @var bool|null Modifier can be splitted
     * This field is supported since 7.2.4 iikoRMS version.
     */
    public ?bool $splittable = null;

    /**
     * @var int|null Free of charge amount
     */
    public ?int $freeOfChargeAmount = null;
}
