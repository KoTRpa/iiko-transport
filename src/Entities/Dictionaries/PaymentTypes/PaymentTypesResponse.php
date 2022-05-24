<?php

namespace KMA\IikoTransport\Entities\Dictionaries\PaymentTypes;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Common\PaymentTypes\PaymentType;

class PaymentTypesResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\PaymentTypes\PaymentType>
     * List of payment types and terminal groups where they are available.
     */
    public Collection $paymentTypes;

    public function __construct(?array $data = null)
    {
        $this->correlationId = $data['correlationId'];
        $this->paymentTypes =
            collect($data['paymentTypes'])
                ->map(fn (array $pt): PaymentType => PaymentType::fromArray($pt));
    }
}