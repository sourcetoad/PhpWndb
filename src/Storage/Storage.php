<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Storage;

use PhpWndb\Dataset\Model\Index\SyntacticCategory;

interface Storage
{
    public function openDataStream(SyntacticCategory $syntacticCategory): Stream;

    public function openIndexStream(SyntacticCategory $syntacticCategory): Stream;
}
