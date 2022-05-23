<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class Payment extends Entity
{
    /**
     * TODO: make others TypeKind
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
     * @var \KMA\IikoTransport\Entities\Delivery\CreateDelivery\PaymentAdditionalData|null Additional payment parameters
     */
    public ?PaymentAdditionalData $paymentAdditionalData = null;

    /**
     * @var bool Whether the payment item is externally fiscalized
     * Allowed from version 7.6.3
     */
    public bool $isFiscalizedExternally = false;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->paymentTypeKind = $data['paymentTypeKind'];
            $this->sum = (float)$data['sum'];
            $this->paymentTypeId = $data['paymentTypeId'];
            $this->isProcessedExternally = $data['isProcessedExternally'] ?? false;

            $this->paymentAdditionalData = isset($data['paymentAdditionalData'])
                ? PaymentAdditionalData::fromArray($data['paymentAdditionalData'])
                : null;

            $this->isFiscalizedExternally = $data['isFiscalizedExternally'] ?? false;
        }
    }
}
