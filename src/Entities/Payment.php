<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

/**
 * TODO: make other TypeKind
 */
class Payment
{
    use Jsonable;

    /**
     * @var string
     * depends on Payment class
     */
    public string $paymentTypeKind = 'Cash';

    /**
     * @var float Amount due
     * [0..10000000000]
     */
    public float $sum;

    /**
     * @var string <uuid> Payment type
     * Can be obtained by /api/1/payment_types operation
     */
    public string $paymentTypeId;

    /**
     * @var bool Whether payment item is processed by external payment system (made from outside).
     */
    public bool $isProcessedExternally = false;

    /**
     * TODO: make PaymentAdditionalData
     * @var array|null Additional payment parameters
     */
    public ?array $paymentAdditionalData = null;

    /**
     * @var bool Whether the payment item is externally fiscalized
     */
    public bool $isFiscalizedExternally = false;
}
