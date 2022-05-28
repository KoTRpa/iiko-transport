<?php

namespace KMA\IikoTransport\Entities\Nomenclature;

use KMA\IikoTransport\Entities\Entity;

class SimpleModifierInfo extends Entity
{
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
     * @var bool|null Required availability.
     */
    public ?bool $required = null;

    /**
     * @var bool|null Hide if default amount applied
     * | This field is supported since 7.2.4 iikoRMS version
     */
    public ?bool $hideIfDefaultAmount = null;

    /**
     * @var bool|null Modifier can be split
     * | This field is supported since 7.2.4 iikoRMS version
     */
    public ?bool $splittable = null;

    /**
     * @var int|null Free of charge amount
     */
    public ?int $freeOfChargeAmount = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->defaultAmount = isset($data['defaultAmount']) ? (int)$data['defaultAmount'] : null;
            $this->minAmount = (int)$data['minAmount'];
            $this->maxAmount = (int)$data['maxAmount'];
            $this->required = $data['required'] ?? null;
            $this->hideIfDefaultAmount = $data['hideIfDefaultAmount'] ?? null;
            $this->splittable = $data['splittable'] ?? null;
            $this->freeOfChargeAmount = isset($data['freeOfChargeAmount']) ? (int)$data['freeOfChargeAmount'] : null;
        }
    }
}
