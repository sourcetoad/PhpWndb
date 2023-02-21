<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Parser;

use PhpWndb\Dataset\Storage\Stream;

class TokenizerFactory
{
    public function create(Stream $stream): Tokenizer
    {
        return new Tokenizer($stream);
    }
}
