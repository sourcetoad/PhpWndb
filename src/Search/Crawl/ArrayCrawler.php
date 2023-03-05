<?php

declare(strict_types=1);

namespace PhpWndb\Dataset\Search\Crawl;

use ArrayIterator;
use OutOfBoundsException;

/**
 * @template TValue of object
 * @extends ArrayIterator<int, TValue>
 */
class ArrayCrawler extends ArrayIterator
{
    /**
     * @param TValue[] $array
     */
    public function __construct(array $array)
    {
        parent::__construct(\array_values($array));
    }

    /**
     * @throws OutOfBoundsException
     * @return TValue
     */
    public function getFirst(): mixed
    {
        return $this[0] ?? throw new OutOfBoundsException('There is no first item.');
    }

    /**
     * @throws OutOfBoundsException
     * @return TValue
     */
    public function getLast(): mixed
    {
        return $this[\count($this) - 1] ?? throw new OutOfBoundsException('There is no last item.');
    }
}
