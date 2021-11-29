<?php
declare(strict_types=1);

namespace Stellion\Vidaxl;

use Psr\Http\Client\ClientInterface;
use Stellion\Vidaxl\Arguments\CreateOrderArguments;
use Stellion\Vidaxl\Arguments\GetOrderArguments;
use Stellion\Vidaxl\Request\CreateOrderRequest;
use Stellion\Vidaxl\Request\GetOrderRequest;

class Client
{
    /**
     * @var \Stellion\Vidaxl\Authentication
     */
    private Authentication $authentication;
    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private ClientInterface $httpClient;
    /**
     * @var \Stellion\Vidaxl\Mode
     */
    private Mode $mode;

    /**
     * @param \Stellion\Vidaxl\Authentication $authentication
     * @param \Psr\Http\Client\ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient, Authentication $authentication, Mode $mode)
    {
        $this->authentication = $authentication;
        $this->httpClient = $httpClient;
        $this->mode = $mode;
    }

    /**
     * @param \Stellion\Vidaxl\Arguments\GetOrderArguments $arguments
     * @return array
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getOrder(GetOrderArguments $arguments): array
    {
        $response = $this->httpClient->sendRequest(new GetOrderRequest($this->mode, $this->authentication, $arguments));

        $content = $response->getBody()->getContents();

        return json_decode($content, true) ?? [];
    }

    /**
     * @return array
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getOrders(): array
    {
        $response = $this->httpClient->sendRequest(new GetOrderRequest($this->mode, $this->authentication,
                                                                       new GetOrderArguments()));

        $content = $response->getBody()->getContents();
        return json_decode($content, true) ?? [];
    }

    /**
     * @return array
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createOrder(CreateOrderArguments $arguments): array
    {
        $response = $this->httpClient->sendRequest(new CreateOrderRequest($this->mode, $this->authentication,
                                                                          $arguments));

        $content = $response->getBody()->getContents();
        return json_decode($content, true) ?? [];
    }
}