<?php

namespace KMA\IikoTransport\Enums;

enum PaymentTypeKind: string {
    case Unknown = 'Unknown';
    case Cash = 'Cash';
    case Card = 'Card';
    case Credit = 'Credit';
    case Writeoff = 'Writeoff';
    case Voucher = 'Voucher';
    case External = 'External';
    case IikoCard = 'IikoCard';
}
