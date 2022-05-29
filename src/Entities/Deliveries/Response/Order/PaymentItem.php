<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class PaymentItem extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Response\Order\PaymentType Payment type
     * Can be obtained by `/api/1/payment_types` operation
     */
    public PaymentType $paymentType;

    /**
     * @required
     * @var float Amount due
     */
    public float $sum;

    /**
     * @required
     * @var bool Whether payment item is preliminary
     */
    public bool $isPreliminary;

    /**
     * @required
     * @var bool Payment item is external (created via `biz.API`)
     */
    public bool $isExternal;

    /**
     * @required
     * @var bool Payment item is processed by external payment system
     */
    public bool $isProcessedExternally;

    /**
     * @var bool|null Whether the payment item is externally fiscalized
     * | Allowed from version 7.6.3
     */
    public ?bool $isFiscalizedExternally = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->paymentType = PaymentType::fromArray($data['paymentType']);
            $this->sum = $data['sum'];
            $this->isPreliminary = $data['isPreliminary'];
            $this->isExternal = $data['isExternal'];
            $this->isProcessedExternally = $data['isProcessedExternally'];
            $this->isFiscalizedExternally = $data['isFiscalizedExternally'] ?? null;
        }
    }
}
