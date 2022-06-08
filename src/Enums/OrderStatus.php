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
}
