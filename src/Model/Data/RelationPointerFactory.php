<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\Data;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;
use PhpWndb\Dataset\Model\RelationPointerType;

class RelationPointerFactory
{
    public function create(
        RelationPointerType $type,
        int $synsetOffset,
        SyntacticCategory $synsetSyntacticCategory,
        ?int $sourceSynsetWordIndex,
        ?int $targetSynsetWordIndex,
    ): RelationPointer {
        return new RelationPointer(
            type: $type,
            synsetOffset: $synsetOffset,
            synsetSyntacticCategory: $synsetSyntacticCategory,
            sourceSynsetWordIndex: $sourceSynsetWordIndex,
            targetSynsetWordIndex: $targetSynsetWordIndex,
        );
    }
}
