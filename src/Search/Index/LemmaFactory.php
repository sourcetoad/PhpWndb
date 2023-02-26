<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Search\Index;

class LemmaFactory
{
    public function create(string $searchTerm): string
    {
        return \strtolower(\str_replace(' ', '_', $searchTerm));
    }
}
