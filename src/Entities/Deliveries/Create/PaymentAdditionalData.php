<?php

namespace KMA\IikoTransport\Entities\Deliveries\Create;

use KMA\IikoTransport\Entities\Entity;

class PaymentAdditionalData extends Entity
{
    /**
     * @required
     * @var string Guest credential, authorizing payment
     */
    public string $credential;

    /**
     * @required
     * @var string Guest credential search scope
     * Enum: "Reserved" "Phone" "CardNumber" "CardTrack" "PaymentToken" "FindFaceId"
     */
    public string $searchScope;

    /**
     * @required
     * @var string IikoCard
     */
    public string $type;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->credential = $data['credential'];
            $this->searchScope = $data['searchScope'];
            $this->type = $data['type'];
        }
    }
}
