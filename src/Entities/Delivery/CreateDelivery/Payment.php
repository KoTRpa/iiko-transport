<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

/**
 * TODO: make other TypeKind
 */
class Payment extends Entity
{
    /**
     * @required
     * @var string
     * depends on Payment class
     */
    public string $paymentTypeKind = 'Cash';

    /**
     * @required
     * @var float Amount due
     * [0..10000000000]
     */
    public float $sum;

    /**
     * @required
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
     * Allowed from version 7.6.3
     */
    public bool $isFiscalizedExternally = false;
}
