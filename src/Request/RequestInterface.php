<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Request;

use Stellion\Vidaxl\Arguments\ArgumentsInterface;
use Stellion\Vidaxl\Arguments\GetOrderArguments;
use Stellion\Vidaxl\AuthenticationInterface;
use Stellion\Vidaxl\Mode;

interface RequestInterface
{
    public function getMode(): Mode;

    public function getHttpMethod(): string;

    public function getEndpoint(): string;

    public function getAuthentication(): AuthenticationInterface;

    public function getArguments(): ArgumentsInterface;
}