<?php

namespace Jecar\Commerce\Resources;

use Jecar\Core\Collections\Collection;
use Jecar\Commerce\Resources\PageResource;

class PageCollection extends Collection
{
    public function __construct($resource)
    {
        $this->collection = PageResource::collection($resource);
        parent::__construct($resource);
    }
}
