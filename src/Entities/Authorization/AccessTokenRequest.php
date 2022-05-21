<?php

namespace KMA\IikoTransport\Entities\Authorization;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

class AccessTokenRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string API login. It is set in iikoWeb
     */
    public string $apiLogin;

    const ATTRIBUTES = [
        'apiLogin' => 'string'
    ];

    /**
     * @param array|null $data
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     */
    public function __construct(
        #[ArrayShape(self::ATTRIBUTES)]
        ?array $data = null
    )
    {
        if (null !== $data) {
            if (!isset($data['apiLogin'])) {
                throw new MissingRequiredFieldException('apiLogin');
            }

            $this->apiLogin = $data['apiLogin'];
        }
    }
}
