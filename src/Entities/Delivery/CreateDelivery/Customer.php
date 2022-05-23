<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class Customer extends Entity
{
    /**
     * @var string|null <uuid> Existing customer ID in RMS.
     * If null - the phone number is searched in database, otherwise the new customer is created in RMS.
     */
    public ?string $id = null;

    /**
     * @var string|null Name of customer
     * [0..60] characters
     * Required for new customers (i.e. if "id" == null) Not required if "id" specified
     */
    public ?string $name = null;

    /**
     * @var string|null Last name
     * [0..60] characters
     */
    public ?string $surname = null;

    /**
     * @var string|null Comment
     * [0..60] characters
     */
    public ?string $comment = null;

    /**
     * @var string|null Date of birth
     * <yyyy-MM-dd HH:mm:ss.fff>
     */
    public ?string $birthdate = null;

    /**
     * @var string|null <uuid> email
     */
    public ?string $email = null;

    /**
     * @var bool Whether user is included in promotional mailing list
     */
    public bool $shouldReceiveOrderStatusNotifications = false;

    /**
     * @var string Gender
     * Enum: "NotSpecified" "Male" "Female"
     */
    public string $gender = 'NotSpecified';

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? null;
            $this->surname = $data['surname'] ?? null;
            $this->comment = $data['comment'] ?? null;
            $this->birthdate = $data['birthdate'] ?? null;
            $this->email = $data['email'] ?? null;
            $this->shouldReceiveOrderStatusNotifications = $data['shouldReceiveOrderStatusNotifications'] ?? false;
            $this->gender = $data['gender'] ?? null;
        }
    }
}
