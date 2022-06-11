<?php

namespace KMA\IikoTransport\Enums;

enum DeliveryServiceType: string
{
    case CourierOnly = 'CourierOnly';
    case SelfServiceOnly = 'SelfServiceOnly';
    case CourierAndSelfService = 'CourierAndSelfService';
}
