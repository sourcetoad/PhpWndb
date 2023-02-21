<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\SynsetId;

use PhpWndb\Dataset\Model\Index\IndexEntry;

class SynsetIdFactory
{
    /**
     * @return SynsetId[]
     */
    public function createFromIndexEntry(IndexEntry $indexEntry): array
    {
        return \array_map(
            static fn (int $offset) => new SynsetId($indexEntry->getSyntacticCategory(), $offset),
            $indexEntry->getSynsetOffsets(),
        );
    }
}
