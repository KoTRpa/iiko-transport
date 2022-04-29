<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class ComboInformation extends Entity
{
    /**
     * @required
     * @var string <uuid> New combo ID
     */
    public string $comboId;

    /**
     * @required
     * @var string <uuid> Action ID that defines combo
     */
    public string $comboSourceId;

    /**
     * @required
     * @var string <uuid> Combo group ID to which item belongs
     */
    public string $groupId;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->comboId = $data['comboId'];
            $this->comboSourceId = $data['comboSourceId'];
            $this->groupId = $data['groupId'];
        }
    }
}
