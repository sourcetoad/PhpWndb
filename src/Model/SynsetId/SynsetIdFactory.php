<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Model\SynsetId;

use PhpWndb\Dataset\Model\Data\Synset;
use PhpWndb\Dataset\Model\Data\SynsetType;
use PhpWndb\Dataset\Model\Index\IndexEntry;
use PhpWndb\Dataset\Model\Index\SyntacticCategory;

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

    public function createFromSynset(Synset $synset): SynsetId
    {
        return new SynsetId(
            syntacticCategory: match ($synset->getType()) {
                SynsetType::ADJECTIVE,
                SynsetType::ADJECTIVE_SATELLITE => SyntacticCategory::ADJECTIVE,
                SynsetType::ADVERB => SyntacticCategory::ADVERB,
                SynsetType::NOUN => SyntacticCategory::NOUN,
                SynsetType::VERB => SyntacticCategory::VERB,
            },
            synsetOffset: $synset->getOffset(),
        );
    }
}
