<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureRequest;
use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureResponse;

/**
 * Menu APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Menu
{
    /**
     * @param \KMA\IikoTransport\Endpoints\General\Menu\NomenclatureRequest $req
     *
     * @return \KMA\IikoTransport\Endpoints\General\Menu\NomenclatureResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function nomenclature(NomenclatureRequest $req): NomenclatureResponse
    {
        $res = $this->post(
            'nomenclature',
            $req
        );

        return NomenclatureResponse::fromJson($res->getBody());
    }
}
