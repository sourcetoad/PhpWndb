<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\Data;

class WordFactory
{
    public function create(string $value): Word
    {
        return new Word($value);
    }
}
