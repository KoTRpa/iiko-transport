<?php

namespace KMA\IikoTransport\Entities;

class ComboInformation extends Entity
{
    /**
     * @required
     * @var string <uuid> Created combo ID
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
    public string $comboGroupId;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->comboId = $data['comboId'];
            $this->comboSourceId = $data['comboSourceId'];
            $this->comboGroupId = $data['comboGroupId'];
        }
    }
}
