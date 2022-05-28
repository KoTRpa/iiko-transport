<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsRequest;
use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsResponse;

/**
 * Nomenclature APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait TerminalGroups
{
    /**
     * @param \KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsResponse
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
            $request
        );

        return TerminalGroupsResponse::fromJson($response->getBody());
    }
}
