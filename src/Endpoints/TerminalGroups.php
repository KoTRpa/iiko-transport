<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Requests\TerminalGroupsRequest;
use KMA\IikoTransport\Entities\TerminalGroup;

/**
 * Nomenclature APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait TerminalGroups
{
    /**
     * @param \KMA\IikoTransport\Entities\Requests\TerminalGroupsRequest $request
     * @return \KMA\IikoTransport\Entities\TerminalGroup[]
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \JsonMapper_Exception
     */
    public function terminalGroups(TerminalGroupsRequest $request): array
    {
        $endpoint = 'terminal_groups';

        $response = $this->post($endpoint, (array)$request, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ]);

        $data = $response->getDecodedBody();

        return $this->mapper->mapArray($data['terminalGroups'], [], TerminalGroup::class);
    }
}
