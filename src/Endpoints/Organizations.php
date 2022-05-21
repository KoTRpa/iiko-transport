<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Organization;
use KMA\IikoTransport\Entities\Requests\OrganizationsRequest;

/**
 * Nomenclature APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Organizations
{
    /**
     * @param \KMA\IikoTransport\Entities\Requests\OrganizationsRequest $request
     * @return \KMA\IikoTransport\Entities\Organization[]
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \JsonMapper_Exception
     */
    public function organizations(OrganizationsRequest $request): array
    {
        $endpoint = 'organizations';

        $response = $this->post($endpoint, (array)$request, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ]);

        $data = $response->getDecodedBody();

        return $this->mapper->mapArray($data['organizations'], [], Organization::class);
    }
}
