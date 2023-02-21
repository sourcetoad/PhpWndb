<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Repository\Data;

use PhpWndb\Dataset\Model\Data\Synset;
use PhpWndb\Dataset\Model\Index\SyntacticCategory;
use PhpWndb\Dataset\Parser\Exception\ParseException;
use PhpWndb\Dataset\Parser\SynsetParser;
use PhpWndb\Dataset\Storage\Stream;

class SynsetSource
{
    public function __construct(
        protected readonly SyntacticCategory $syntacticCategory,
        protected readonly Stream $stream,
        protected readonly SynsetParser $parser,
    ) {
    }

    /**
     * @throw ParseException
     */
    public function getSynset(int $synsetOffset): Synset
    {
        $this->stream->seek($synsetOffset);

        try {
            return $this->parser->parseSynset($this->stream);
        } catch (ParseException $exception) {
            $category = $this->syntacticCategory->name;
            throw new ParseException(
                message: "Parse synset($category) `{$synsetOffset}` failed: " . $exception->getMessage(),
                previous: $exception,
            );
        }
    }
}
