<?php
namespace Spatie\Searchable;

class SearchResult
{
    /** @var \Spatie\Searchable\Searchable */
    public $searchable;

    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $category;

    /** @var null|string */
    public $url;

    /** @var string */
    public $type;

    /** @var string */
    public $phone;

    public function __construct(Searchable $searchable, string $title, string $description= null, string $category= null, string $phone= null, ?string $url = null)
    {
        $this->searchable = $searchable;

        $this->title = $title;

        $this->description = $description;

        $this->category = $category;

        $this->phone = $phone;

        $this->url = $url;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
