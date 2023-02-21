<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\Data;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;
use PhpWndb\Dataset\Model\RelationPointerType;

class RelationPointer
{
    public function __construct(
        protected readonly RelationPointerType $type,
        protected readonly int $synsetOffset,
        protected readonly SyntacticCategory $synsetSyntacticCategory,
        protected readonly ?int $sourceSynsetWordIndex,
        protected readonly ?int $targetSynsetWordIndex,
    ) {
    }

    public function getType(): RelationPointerType
    {
        return $this->type;
    }

    public function getSynsetOffset(): int
    {
        return $this->synsetOffset;
    }

    public function getSynsetSyntacticCategory(): SyntacticCategory
    {
        return $this->synsetSyntacticCategory;
    }

    public function getSourceSynsetWordIndex(): ?int
    {
        return $this->sourceSynsetWordIndex;
    }

    public function getTargetSynsetWordIndex(): ?int
    {
        return $this->targetSynsetWordIndex;
    }
}
