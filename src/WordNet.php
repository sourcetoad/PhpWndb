<?php

declare(strict_types=1);

namespace PhpWndb\Dataset;

use PhpWndb\Dataset\Search\Crawl\SynsetListCrawler;
use PhpWndb\Dataset\Search\Crawl\SynsetListCrawlerFactory;
use PhpWndb\Dataset\Search\Data\SynsetSearchEngine;
use PhpWndb\Dataset\Search\Index\IndexSearchEngine;

class WordNet
{
    public function __construct(
        protected readonly SynsetListCrawlerFactory $crawlerFactory,
        protected readonly IndexSearchEngine $indexSearchEngine,
        protected readonly SynsetSearchEngine $synsetSearchEngine,
    ) {
    }

    public function search(string $searchTerm): SynsetListCrawler
    {
        $synsetIds = $this->indexSearchEngine->search($searchTerm);
        $synsets = $this->synsetSearchEngine->listBySynsetIds($synsetIds);

        return $this->crawlerFactory->createFromSynsets($synsets);
    }
}
