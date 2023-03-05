<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Search\Crawl;

use PhpWndb\Dataset\Model\Data\RelationPointer;
use PhpWndb\Dataset\Model\Data\Synset;
use PhpWndb\Dataset\Model\Data\SynsetType;
use PhpWndb\Dataset\Model\RelationPointerType;
use PhpWndb\Dataset\Model\SynsetId\SynsetId;
use PhpWndb\Dataset\Model\SynsetId\SynsetIdFactory;
use PhpWndb\Dataset\Search\Data\SynsetSearchEngine;

/**
 * @extends ArrayCrawler<WordCrawler>
 *
 * @method WordCrawler offsetGet(mixed $key)
 * @method WordCrawler current()
 */
class SynsetCrawler extends ArrayCrawler
{
    public function __construct(
        protected readonly Synset $synset,
        protected readonly SynsetIdFactory $synsetIdFactory,
        protected readonly WordCrawlerFactory $wordCrawlerFactory,
        protected readonly SynsetListCrawlerFactory $synsetListCrawlerFactory,
        protected readonly SynsetSearchEngine $synsetSearchEngine,
    ) {
        parent::__construct(
            $this->wordCrawlerFactory->createAllFromSynset($this->synset),
        );
    }

    public function moveTo(RelationPointerType $pointerType): SynsetListCrawler
    {
        $pointers = \array_filter(
            $this->synset->getRelationPointers(),
            static fn (RelationPointer $pointer)
                => $pointer->getSourceSynsetWordIndex() === null && $pointer->getType() === $pointerType,
        );

        $synsets = $this->synsetSearchEngine->listByRelations($pointers);

        return $this->synsetListCrawlerFactory->createFromSynsets($synsets);
    }

    public function getSynsetId(): SynsetId
    {
        return $this->synsetIdFactory->createFromSynset($this->synset);
    }

    public function getType(): SynsetType
    {
        return $this->synset->getType();
    }

    public function getGloss(): string
    {
        return $this->synset->getGloss();
    }
}
