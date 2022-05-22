<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Dictionaries\PaymentTypes;
use KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\PaymentTypesRequest;
use KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\PaymentTypesResponse;

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
     * @param \KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\PaymentTypesRequest $request
     *
     * @return \KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\PaymentTypesResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function paymentTypes(PaymentTypesRequest $request): PaymentTypesResponse
    {
        $response = $this->post(
            'payment_types',
            $request,
            [ 'Authorization' => 'Bearer ' . $this->accessToken() ]
        );

        return PaymentTypesResponse::fromJson($response->getBody());
    }
}
