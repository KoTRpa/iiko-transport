<?php

namespace KMA\IikoTransport\Enums;

enum PaymentProcessingType: string {
    case External = 'External';
    case Internal = 'Internal';
    case Both = 'Both';
}
