<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Contracts\Jsonable;

class Group
{
    use Jsonable;

    /**
     * @var string[] Links to images
     */
    public array $imageLinks = [];

    /**
     * @var string|null <uuid> Parent group
     */
    public ?string $parentGroup = null;

    /**
     * @var int Group's order (priority) in menu.
     */
    public int $order;

    /**
     * @var bool On-the-menu attribute
     */
    public bool $isIncludedInMenu;

    /**
     * @var bool Is group modifier attribute
     */
    public bool $isGroupModifier;

    /**
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @var string|null SKU
     */
    public ?string $code = null;

    /**
     * @var string Name
     */
    public string $name;

    /**
     * @var string|null Description
     */
    public ?string $description = null;

    /**
     * @var string|null Additional information
     */
    public ?string $additionalInfo = null;

    /**
     * @var string[]|null Tags
     */
    public ?array $tags = null;

    /**
     * @var bool Is-Deleted attribute
     */
    public bool $isDeleted;

    /**
     * @var string|null SEO description for client.
     */
    public ?string $seoDescription = null;

    /**
     * @var string|null SEO text for robots
     */
    public ?string $seoText = null;

    /**
     * @var string|null SEO keywords
     */
    public ?string $seoKeywords = null;

    /**
     * @var string|null SEO header
     */
    public ?string $seoTitle = null;
}
