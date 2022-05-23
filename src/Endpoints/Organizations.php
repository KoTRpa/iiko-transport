<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Organizations\OrganizationsRequest;
use KMA\IikoTransport\Entities\Organizations\OrganizationsResponse;

/**
 * Organizations APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Organizations
{
    /**
     * @param \KMA\IikoTransport\Entities\Organizations\OrganizationsRequest $request
     *
     * @return \KMA\IikoTransport\Entities\Organizations\OrganizationsResponse
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
            $request,
            [ 'Authorization' => 'Bearer ' . $this->accessToken() ]
        );

        return OrganizationsResponse::fromJson($response->getBody());
    }
}
