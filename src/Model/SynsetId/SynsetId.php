<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\SynsetId;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;

class SynsetId
{
    public function __construct(
        protected readonly SyntacticCategory $syntacticCategory,
        protected readonly int $synsetOffset,
    ) {
    }

    public function getSyntacticCategory(): SyntacticCategory
    {
        return $this->syntacticCategory;
    }

    public function getSynsetOffset(): int
    {
        return $this->synsetOffset;
    }
}
