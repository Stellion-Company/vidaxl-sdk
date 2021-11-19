<?php
declare(strict_types=1);

namespace Stellion\Vidaxl;

interface AuthenticationInterface
{
    /**
     * @return string
     */
    public function getAuthorizationHeader(): string;
}