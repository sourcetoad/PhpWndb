<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Repository\Index;

use PhpWndb\Dataset\Model\Index\IndexEntry;
use PhpWndb\Dataset\Parser\IndexParser;
use PhpWndb\Dataset\Storage\Stream;
use PhpWndb\Dataset\Storage\StreamSearcher;

class IndexSource
{
    public function __construct(
        protected readonly Stream $stream,
        protected readonly StreamSearcher $searcher,
        protected readonly IndexParser $parser,
    ) {
    }

    public function findIndexEntry(string $lemma): ?IndexEntry
    {
        $found = $this->searcher->seekToLineStart($this->stream, "{$lemma} ");

        return $found ? $this->parser->parseIndex($this->stream) : null;
    }
}
