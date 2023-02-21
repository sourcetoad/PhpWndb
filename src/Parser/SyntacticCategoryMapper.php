<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Parser;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;
use PhpWndb\Dataset\Parser\Exception\ParseException;

class SyntacticCategoryMapper
{
    /**
     * @throws ParseException
     */
    public function mapSyntacticCategory(string $syntacticCategory): SyntacticCategory
    {
        return match ($syntacticCategory) {
            'n' => SyntacticCategory::NOUN,
            'v' => SyntacticCategory::VERB,
            'a' => SyntacticCategory::ADJECTIVE,
            'r' => SyntacticCategory::ADVERB,
            default => throw new ParseException("Unknown syntactic category `{$syntacticCategory}`."),
        };
    }
}
