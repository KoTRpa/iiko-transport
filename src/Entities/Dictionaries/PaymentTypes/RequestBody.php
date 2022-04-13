<?php

namespace KMA\IikoTransport\Entities\Dictionaries\PaymentTypes;

class RequestBody
{
    /**
     * @required
     * @var string[] [<uuid>] Organizations IDs which payment types have to be returned
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;
}
