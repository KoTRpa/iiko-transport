<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Dictionaries\PaymentTypes;

/**
 * Dictionaries APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Dictionaries
{
    /**
     * Fetch payment types
     *
     * @param \KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\RequestBody $body
     * @return \KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\Response
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     */
    public function paymentTypes(PaymentTypes\RequestBody $body): PaymentTypes\Response
    {
        $endpoint = 'payment_types';

        $params = (array)$body;

        $res = $this->post($endpoint, $params, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ])->getDecodedBody();

        return PaymentTypes\Response::fromArray($res);
    }
}
