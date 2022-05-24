<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsRequest;
use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsResponse;

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
     * @param \KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsRequest $request
     *
     * @return \KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function terminalGroups(TerminalGroupsRequest $request): TerminalGroupsResponse
    {
        $response = $this->post(
            'terminal_groups',
            $request,
            [ 'Authorization' => 'Bearer ' . $this->accessToken() ]
        );

        return TerminalGroupsResponse::fromJson($response->getBody());
    }
}
