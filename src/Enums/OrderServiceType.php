<?php

namespace KMA\IikoTransport\Enums;

enum OrderServiceType: string
{
    case DeliveryByCourier = 'DeliveryByCourier';
    case DeliveryByClient = 'DeliveryByClient';
}
