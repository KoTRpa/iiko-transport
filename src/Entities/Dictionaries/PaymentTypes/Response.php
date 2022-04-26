<?php

namespace KMA\IikoTransport\Entities\Dictionaries\PaymentTypes;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\PaymentType;

class Response extends Entity
{
    use HasCorrelationId;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\PaymentType>
     * List of payment types and terminal groups where they are available.
     */
    public Collection $paymentTypes;

    public function __construct(?array $data = null)
    {
        $this->correlationId = $data['correlationId']; // TODO: на доверии?
        $this->paymentTypes = \collect($data['paymentTypes'])->map(function (array $pt) {
            return PaymentType::fromArray($pt);
        });
    }
}
