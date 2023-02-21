<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Search\Data;

use PhpWndb\Dataset\Model\Data\RelationPointer;
use PhpWndb\Dataset\Model\Data\Synset;
use PhpWndb\Dataset\Model\SynsetId\SynsetId;
use PhpWndb\Dataset\Repository\Data\SynsetRepository;

class SynsetSearchEngine
{
    public function __construct(
        protected readonly SynsetRepository $synsetRepository,
    ) {
    }

    /**
     * @param SynsetId[] $synsetIds
     * @return Synset[]
     */
    public function listBySynsetIds(array $synsetIds): array
    {
        $synsets = [];
        foreach ($synsetIds as $synsetId) {
            $synsets[] = $this->synsetRepository->getSynset(
                $synsetId->getSyntacticCategory(),
                $synsetId->getSynsetOffset(),
            );
        }

        return $synsets;
    }

    /**
     * @param RelationPointer[] $relationPointers
     * @return Synset[]
     */
    public function listByRelations(array $relationPointers): array
    {
        return \array_map(
            fn (RelationPointer $pointer) => $this->getByRelation($pointer),
            $relationPointers,
        );
    }

    public function getByRelation(RelationPointer $relationPointer): Synset
    {
        return $this->synsetRepository->getSynset(
            $relationPointer->getSynsetSyntacticCategory(),
            $relationPointer->getSynsetOffset(),
        );
    }
}
