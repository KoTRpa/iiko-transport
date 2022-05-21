<?php

namespace KMA\IikoTransport\Entities\Common\Nomenclature;

use KMA\IikoTransport\Entities\Entity;
use Illuminate\Support\Collection;

class GroupModifierInfo extends Entity
{
    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

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
     * @required
     * @var bool Required availability.
     */
    public bool $required;

    /**
     * @var bool|null Presence of max/min quantity limitations of child modifiers
     */
    public ?bool $childModifiersHaveMinMaxRestrictions = null;

    /**
     * List of child modifiers
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Nomenclature\ChildModifierInfo>
     */
    public Collection $childModifiers;

    /**
     * @var bool|null Hide if default amount applied
     * | This field is supported since 7.2.4 iikoRMS version
     */
    public ?bool $hideIfDefaultAmount = null;

    /**
     * @var int|null Default quantity
     */
    public ?int $defaultAmount = null;

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
            $this->minAmount = (int)$data['minAmount'];
            $this->maxAmount = (int)$data['maxAmount'];
            $this->required = $data['required'];
            $this->childModifiersHaveMinMaxRestrictions = $data['childModifiersHaveMinMaxRestrictions'] ?? null;
            $this->childModifiers = collect($data['childModifiers'])->map(function (array $item): ChildModifierInfo {
                return ChildModifierInfo::fromArray($item);
            });
            $this->hideIfDefaultAmount = $data['hideIfDefaultAmount'] ?? null;
            $this->defaultAmount = isset($data['defaultAmount']) ? (int)$data['defaultAmount'] : null;
            $this->splittable = $data['splittable'] ?? null;
            $this->freeOfChargeAmount = isset($data['freeOfChargeAmount']) ? (int)$data['freeOfChargeAmount'] : null;
        }
    }
}
