<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Nomenclature as Entity;

/**
 * Nomenclature APIs
 *
 * @mixin \KMA\IikoTransport\Traits\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Nomenclature
{
    /**
     * @param string $orgId iiko organization id
     * @return \KMA\IikoTransport\Entities\Nomenclature
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \JsonMapper_Exception
     */
    public function nomenclature(string $orgId): Entity
    {
        $endpoint = 'nomenclature';

        $params = [
            'organizationId' => $orgId,
            'startRevision' => 0
        ];

        $response = $this->post($endpoint, $params, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ]);

        $data = $response->getDecodedBody();

        return $this->mapper->map($data, new Entity);
    }
}
