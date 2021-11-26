<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Arguments;

interface ArgumentsInterface
{
    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function asHttpQuery(): string;
}