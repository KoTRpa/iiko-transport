<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Menu\Menu\MenuRequest;
use KMA\IikoTransport\Entities\Menu\Menu\MenuResponse;

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
     * @param \KMA\IikoTransport\Entities\Menu\Menu\MenuRequest $req
     * @return \KMA\IikoTransport\Entities\Menu\Menu\MenuResponse
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \JsonException
     */
    public function nomenclature(MenuRequest $req): MenuResponse
    {
        $res = $this->post(
            'nomenclature', 
            $req->toArray(),
            ['Authorization' => 'Bearer ' . $this->accessToken()]
        );

        return MenuResponse::fromJson($res->getBody());
    }
}
