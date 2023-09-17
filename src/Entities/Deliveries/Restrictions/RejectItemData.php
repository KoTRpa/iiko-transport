<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class RejectItemData extends Entity
{
    /**
     * @var null|string <yyyy-mm-dd hh:mm:ss.fff> Point work time start.
     */
    public ?string $dateFrom = null;

    /**
     * @var null|string <yyyy-mm-dd hh:mm:ss.fff> Point work time end.
     */
    public ?string $dateTo = null;

    /**
     * @var null|string[] Allowed week days.
     */
    public ?array $allowedWeekDays = null;

    /**
     * @var float Order min sum.
     */
    public float $minSum;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->dateFrom = $data['dateFrom'] ?? null;
            $this->dateTo = $data['dateTo'] ?? null;
            $this->allowedWeekDays = $data['allowedWeekDays'] ?? null;
            $this->minSum = $data['minSum'] ?? null;
        }
    }
}
