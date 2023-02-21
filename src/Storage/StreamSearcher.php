<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Storage;

interface StreamSearcher
{
    public function seekToLineStart(Stream $stream, string $lineStart): bool;
}
