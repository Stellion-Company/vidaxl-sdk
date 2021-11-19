<?php
declare(strict_types=1);

namespace Stellion\Vidaxl;

class Authentication implements AuthenticationInterface
{
    private string $username;
    private string $token;

    /**
     * @param string $username
     * @param string $token
     */
    public function __construct(string $username, string $token)
    {
        $this->username = $username;
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getAuthorizationHeader(): string
    {
        return sprintf('Basic %s', base64_encode($this->username . ':' . $this->token));
    }
}