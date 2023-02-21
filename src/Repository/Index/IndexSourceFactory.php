<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Repository\Index;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;
use PhpWndb\Dataset\Parser\IndexParser;
use PhpWndb\Dataset\Storage\Storage;
use PhpWndb\Dataset\Storage\StreamSearcher;

class IndexSourceFactory
{
    public function __construct(
        protected readonly Storage $storage,
        protected readonly StreamSearcher $streamSearcher,
        protected readonly IndexParser $indexParser,
    ) {
    }

    public function create(SyntacticCategory $syntacticCategory): IndexSource
    {
        return new IndexSource(
            stream: $this->storage->openIndexStream($syntacticCategory),
            searcher: $this->streamSearcher,
            parser: $this->indexParser,
        );
    }
}
