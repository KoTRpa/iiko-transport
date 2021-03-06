<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsRequest;
use KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsResponse;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesRequest;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesResponse;

/**
 * Dictionaries APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Dictionaries
{
    /**
     * Fetch payment types
     *
     * @param \KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesResponse
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
            $request
        );

        return PaymentTypesResponse::fromJson($response->getBody());
    }

    /**
     * Discounts
     *
     * @param \KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function discounts(DiscountsRequest $request): DiscountsResponse
    {
        $response = $this->post(
            'discounts',
            $request
        );

        return DiscountsResponse::fromJson($response->getBody());
    }
}
