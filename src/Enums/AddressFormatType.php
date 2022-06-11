<?php

namespace KMA\IikoTransport\Enums;

enum AddressFormatType: string
{
    case Legacy = 'Legacy';
    case City = 'City';
    case International = 'International';
    case IntNoPostcode = 'IntNoPostcode';
}
