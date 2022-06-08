<?php

namespace KMA\IikoTransport\Enums;

enum OrderStatus: string
{
    case Unconfirmed = 'Unconfirmed';
    case WaitCooking = 'WaitCooking';
    case ReadyForCooking = 'ReadyForCooking';
    case CookingStarted = 'CookingStarted';
    case CookingCompleted = 'CookingCompleted';
    case Waiting = 'Waiting';
    case OnWay = 'OnWay';
    case Delivered = 'Delivered';
    case Closed = 'Closed';
    case Cancelled = 'Cancelled';

    /**
     * Status priority
     *
     * @return int
     */
    public function order(): int
    {
        return match($this) {
            self::Unconfirmed => 1,
            self::WaitCooking => 2,
            self::ReadyForCooking => 3,
            self::CookingStarted => 4,
            self::CookingCompleted => 5,
            self::Waiting => 6,
            self::OnWay => 7,
            self::Delivered => 8,
            self::Closed => 9,
            self::Cancelled => 10
        };
    }

    /**
     * Is final state
     * @return bool
     */
    public function isFinal(): bool
    {
        return match($this) {
            self::Closed, self::Cancelled => true,
            default => false
        };
    }
}
