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

    public function toString(): string
    {
        return match ($this->syntacticCategory) {
            SyntacticCategory::ADJECTIVE => 'aj',
            SyntacticCategory::ADVERB => 'av',
            SyntacticCategory::NOUN => 'no',
            SyntacticCategory::VERB => 've',
        } . $this->synsetOffset;
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
