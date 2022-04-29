<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class Customer extends Entity
{
    use HasRelationFields;

    /**
     * @var string|null Last name
     */
    public ?string $surname = null;

    /**
     * @var string|null Comment
     */
    public ?string $comment = null;

    /**
     * @var string|null Sex
     * Enum: "NotSpecified" "Male" "Female"
     * TODO: make real enums
     */
    public ?string $gender = null;

    /**
     * @var bool Is client in blacklist
     */
    public bool $inBlacklist = false;

    /**
     * @var string|null Reason why client was added to blacklist
     */
    public ?string $blacklistReason = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Date of birth
     * | Allowed from version 7.6.1
     */
    public ?string $birthdate = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->surname = $data['surname'] ?? null;
            $this->comment = $data['comment'] ?? null;
            $this->gender = $data['gender'] ?? null;
            $this->inBlacklist = $data['inBlacklist'] ?? false;
            $this->blacklistReason = $data['blacklistReason'] ?? null;
            $this->birthdate = $data['birthdate'] ?? null;
        }
    }
}
