<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Repository\Data;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;
use PhpWndb\Dataset\Parser\SynsetParser;
use PhpWndb\Dataset\Storage\Storage;

class SynsetSourceFactory
{
    public function __construct(
        protected readonly Storage $storage,
        protected readonly SynsetParser $synsetParser,
    ) {
    }

    public function create(SyntacticCategory $syntacticCategory): SynsetSource
    {
        return new SynsetSource(
            syntacticCategory: $syntacticCategory,
            stream: $this->storage->openDataStream($syntacticCategory),
            parser: $this->synsetParser,
        );
    }
}
