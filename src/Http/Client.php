<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Http;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client implements ClientInterface
{
    private \GuzzleHttp\ClientInterface $client;

    /**
     * @param \GuzzleHttp\ClientInterface $client
     */
    public function __construct(\GuzzleHttp\ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param \Psr\Http\Message\RequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->client->send($request);
    }

    /**
     * Proxy to client
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public function __call(string $name, array $arguments)
    {
        if (method_exists($this->client, $name)) {
            return $this->client->{$name}(...$arguments);
        }
    }
}