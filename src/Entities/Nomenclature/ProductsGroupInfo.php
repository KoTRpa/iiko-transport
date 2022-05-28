<?php

namespace KMA\IikoTransport\Entities\Nomenclature;

use KMA\IikoTransport\Entities\Entity;

class ProductsGroupInfo extends Entity
{
    /**
     * @required
     * @var string[] Links to images
     */
    public array $imageLinks;

    /**
     * @var ?string|null <uuid> External menu group
     */
    public ?string $parentGroup = null;

    /**
     * @required
     * @var int Product's order (priority) in menu
     */
    public int $order;

    /**
     * @required
     * @var bool On-the-menu attribute
     */
    public bool $isIncludedInMenu;

    /**
     * @required
     * @var bool Is group modifier attribute
     * true - group modifier. false - external menu group.
     */
    public bool $isGroupModifier;

    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @var ?string|null SKU
     */
    public ?string $code = null;

    /**
     * @required
     * @var string name
     */
    public string $name;

    /**
     * @var ?string|null description
     */
    public ?string $description = null;

    /**
     * @var ?string|null additionalInfo
     */
    public ?string $additionalInfo = null;

    /**
     * @var ?string[]|null Tags
     */
    public ?array $tags = null;

    /**
     * @required
     * @var bool Is-Deleted attribute
     */
    public bool $isDeleted;

    /**
     * @var ?string|null SEO description for client
     */
    public ?string $seoDescription = null;

    /**
     * @var ?string|null SEO text for robots
     */
    public ?string $seoText = null;

    /**
     * @var ?string|null SEO keywords
     */
    public ?string $seoKeywords = null;

    /**
     * @var ?string|null SEO header
     */
    public ?string $seoTitle = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->imageLinks = $data['imageLinks'];
            $this->parentGroup = $data['parentGroup'] ?? null;
            $this->order = (isset($data['order'])) ? (int)$data['order'] : null;
            $this->isIncludedInMenu = $data['isIncludedInMenu'];
            $this->isGroupModifier = $data['isGroupModifier'];
            $this->id = $data['id'];
            $this->code = $data['code'] ?? null;
            $this->name = $data['name'];
            $this->description = $data['description'] ?? null;
            $this->additionalInfo = $data['additionalInfo'] ?? null;
            $this->tags = $data['tags'] ?? null;
            $this->isDeleted = $data['isDeleted'];
            $this->seoDescription = $data['seoDescription'] ?? null;
            $this->seoText = $data['seoText'] ?? null;
            $this->seoKeywords = $data['seoKeywords'] ?? null;
            $this->seoTitle = $data['seoTitle'] ?? null;
        }
    }
}
