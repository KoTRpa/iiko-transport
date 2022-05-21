<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Menu\NomenclatureRequest;
use KMA\IikoTransport\Entities\Menu\NomenclatureResponse;

/**
 * Menu APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Menu
{
    /**
     * @param \KMA\IikoTransport\Entities\Menu\NomenclatureRequest $req
     *
     * @return \KMA\IikoTransport\Entities\Menu\NomenclatureResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function nomenclature(NomenclatureRequest $req): NomenclatureResponse
    {
        $res = $this->post(
            'nomenclature',
            $req->toJson(),
            ['Authorization' => 'Bearer ' . $this->accessToken()]
        );

        return NomenclatureResponse::fromJson($res->getBody());
    }
}
