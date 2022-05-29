<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Create;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Deliveries\Create\CreateOrderSettings;
use KMA\IikoTransport\Entities\Deliveries\Create\Order;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

class CreateDeliveryRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string <uuid> Organization ID
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @var string|null <uuid> Front group ID an order must be sent to
     * Can be obtained by /api/1/terminal_groups operation.
     */
    public ?string $terminalGroupId = null;

    /**
     * @var \KMA\IikoTransport\Entities\Deliveries\Create\CreateOrderSettings|null Order creation parameters
     */
    public ?CreateOrderSettings $createOrderSettings = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Create\Order Order
     */
    public Order $order;


    const ATTRIBUTES = [
        'organizationId' => 'string',
        'terminalGroupId' => 'string',
        'createOrderSettings' => CreateOrderSettings::class,
        'order' => Order::class,
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
            if (!isset($data['organizationId'])) {
                throw new MissingRequiredFieldException('organisationId');
            }

            if (!isset($data['order'])) {
                throw new MissingRequiredFieldException('order');
            }

            $this->organizationId = $data['organizationId'];
            $this->terminalGroupId = $data['terminalGroupId'] ?? null;
            $this->createOrderSettings = isset($data['createOrderSettings'])
                ? CreateOrderSettings::fromArray($data['createOrderSettings'])
                : null;
            $this->order = Order::fromArray($data['order']);
        }
    }
}
