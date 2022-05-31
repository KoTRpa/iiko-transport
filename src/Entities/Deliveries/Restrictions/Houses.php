<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class Houses extends Entity
{
    /**
     * @required
     * @var int Type of house number range
     * | Enum: 0 1 2 3
     */
    public int $type;

    /**
     * @required
     * @var int Starting house number
     */
    public int $startingNumber;

    /**
     * @required
     * @var int Maximum house number
     */
    public int $maxNumber;

    /**
     * @required
     * @var bool Unlimited range
     */
    public bool $isUnlimitedRange;

    /**
     * @required
     * @var string[] Specific numbers
     */
    public array $specificNumbers;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->type = $data['type'];
            $this->startingNumber = $data['startingNumber'];
            $this->maxNumber = $data['maxNumber'];
            $this->isUnlimitedRange = $data['isUnlimitedRange'];
            $this->specificNumbers = $data['specificNumbers'];
        }
    }
}
