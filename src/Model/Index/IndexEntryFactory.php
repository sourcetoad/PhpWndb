<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\Index;

use PhpWndb\Dataset\Model\RelationPointerType;

class IndexEntryFactory
{
    /**
     * @param RelationPointerType[] $relationPointerTypes
     * @param int[] $synsetOffsets
     */
    public function create(
        SyntacticCategory $syntacticCategory,
        array $relationPointerTypes,
        array $synsetOffsets,
    ): IndexEntry {
        return new IndexEntry($syntacticCategory, $relationPointerTypes, $synsetOffsets);
    }
}
