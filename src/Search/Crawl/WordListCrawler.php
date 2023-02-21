<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Search\Crawl;

/**
 * @extends ArrayCrawler<WordCrawler>
 */
class WordListCrawler extends ArrayCrawler
{
    /**
     * @param WordCrawler[] $wordCrawlers
     */
    public function __construct(
        protected readonly array $wordCrawlers,
    ) {
        parent::__construct($this->wordCrawlers);
    }
}
