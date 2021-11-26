<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Request;

use GuzzleHttp\Psr7\Request;
use Stellion\Vidaxl\Arguments\CreateOrderArguments;
use Stellion\Vidaxl\AuthenticationInterface;
use Stellion\Vidaxl\Mode;

class CreateOrderRequest extends Request implements RequestInterface
{
    use RequestTrait;

    public const VERSION = '1.1';
    /**
     * @var \Stellion\Vidaxl\AuthenticationInterface
     */
    private AuthenticationInterface $auth;
    /**
     * @var \Stellion\Vidaxl\Mode
     */
    private Mode $mode;
    /**
     * @var \Stellion\Vidaxl\Arguments\CreateOrderArguments
     */
    private CreateOrderArguments $arguments;

    /**
     * @param \Stellion\Vidaxl\Mode $mode
     * @param \Stellion\Vidaxl\AuthenticationInterface $auth
     * @param \Stellion\Vidaxl\Arguments\CreateOrderArguments $arguments
     * @param array $headers
     */
    public function __construct(
        Mode                    $mode,
        AuthenticationInterface $auth,
        CreateOrderArguments    $arguments,
        array                   $headers = []
    )
    {
        $this->auth = $auth;
        $this->mode = $mode;
        $this->arguments = $arguments;

        $headers = $this->makeHeaders($headers);

        $uri = $this->makeUri();
        $body = $this->makeBody();

        parent::__construct($this->getHttpMethod(), $uri, $headers, body: $body, version: self::VERSION);
    }

    /**
     * @return \Stellion\Vidaxl\AuthenticationInterface
     */
    public function getAuthentication(): AuthenticationInterface
    {
        return $this->auth;
    }

    /**
     * @return \Stellion\Vidaxl\Mode
     */
    public function getMode(): Mode
    {
        return $this->mode;
    }

    /**
     * @return \Stellion\Vidaxl\Arguments\CreateOrderArguments
     */
    public function getArguments(): CreateOrderArguments
    {
        return $this->arguments;
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getEndpoint(): string
    {
        return '/api_customer/orders';
    }
}