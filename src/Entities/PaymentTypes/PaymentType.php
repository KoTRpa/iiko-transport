<?php

namespace KMA\IikoTransport\Entities\PaymentTypes;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Terminals\TerminalGroup;

class PaymentType extends Entity
{
    /**
     * @var string|null <uuid> Payment type ID
     */
    public ?string $id;

    /**
     * @var string|null Payment type code
     */
    public ?string $code;

    /**
     * @var string|null Payment type name
     */
    public ?string $name;

    /**
     * @var string|null Payment type comment
     */
    public ?string $comment;

    /**
     * @var bool Combinability attribute
     */
    public bool $combinable = true;

    /**
     * @var int|null External system revision number
     */
    public ?int $externalRevision = null;

    /**
     * @var string[] [<uuid>] Array of marketing campaigns associated with iikoCard5 payment type
     * applicable to this organization
     * @required
     */
    public array $applicableMarketingCampaigns;

    /**
     * @var bool IsDeleted attribute of payment type
     */
    public bool $isDeleted = false;

    /**
     * @var bool If true, payment type is fiscal and bill will be printed
     */
    public bool $printCheque = false;

    /**
     * @var string|null Describes operation processing type
     * Enum: "External" "Internal" "Both"
     */
    public ?string $paymentProcessingType = null;

    /**
     * @var string|null Payment type category
     * Enum: "Unknown" "Cash" "Card" "Credit" "Writeoff" "Voucher" "External" "IikoCard"
     * TODO: migrate to enums
     */
    public ?string $paymentTypeKind = null;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Terminals\TerminalGroup>
     * Terminal groups where this payment type is available
     * @required
     */
    public Collection $terminalGroups;


    public function __construct(?array $data = null)
    {
        if ($data !== null) {
            $this->validate($data);

            $this->id = $data['id'] ?? null;
            $this->code = $data['code'] ?? null;
            $this->name = $data['name'] ?? null;
            $this->comment = $data['comment'] ?? null;
            $this->combinable = $data['combinable'];
            $this->externalRevision = $data['externalRevision'] ?? null;
            $this->applicableMarketingCampaigns = $data['applicableMarketingCampaigns'];
            $this->isDeleted = $data['isDeleted'];
            $this->printCheque = $data['printCheque'];
            $this->paymentProcessingType = $data['paymentProcessingType'] ?? null;
            $this->paymentTypeKind = $data['paymentTypeKind'] ?? null;

            $this->terminalGroups =
                collect($data['terminalGroups'])
                    ->map(fn (array $tg): TerminalGroup => TerminalGroup::fromArray($tg));
        }
    }

    /**
     * Validate required fields
     *
     * @param array $data
     * @return void
     * @throws \InvalidArgumentException
     */
    private function validate(array $data): void
    {
        if (!isset($data['combinable']) || !is_bool($data['combinable'])) {
            throw new \InvalidArgumentException('Field "combinable" is undefined or not boolean type');
        }

        if (!isset($data['applicableMarketingCampaigns']) || !is_array($data['applicableMarketingCampaigns'])) {
            throw new \InvalidArgumentException('Field "applicableMarketingCampaigns" is undefined or not array type');
        }

        if (!isset($data['isDeleted']) || !is_bool($data['isDeleted'])) {
            throw new \InvalidArgumentException('Field "isDeleted" is undefined or not boolean type');
        }

        if (!isset($data['printCheque']) || !is_bool($data['printCheque'])) {
            throw new \InvalidArgumentException('Field "printCheque" is undefined or not boolean type');
        }

        if (!isset($data['terminalGroups']) || !is_array($data['terminalGroups'])) {
            throw new \InvalidArgumentException('Field "terminalGroups" is undefined or not array type');
        }
    }
}
