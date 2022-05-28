<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsRequest;
use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsResponse;

/**
 * Organizations APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Organizations
{
    /**
     * @param \KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function organizations(OrganizationsRequest $request): OrganizationsResponse
    {
        $response = $this->post(
            'organizations',
            $request
        );

        return OrganizationsResponse::fromJson($response->getBody());
    }
}
