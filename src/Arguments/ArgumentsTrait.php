<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Arguments;

trait ArgumentsTrait
{
    /**
     * @return string
     */
    public function asHttpQuery(): string
    {
        return http_build_query($this->toArray());
    }
}