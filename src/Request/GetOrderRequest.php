<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Request;

use GuzzleHttp\Psr7\Request;
use Stellion\Vidaxl\Arguments\GetOrderArguments;
use Stellion\Vidaxl\AuthenticationInterface;
use Stellion\Vidaxl\Mode;

class GetOrderRequest extends Request implements RequestInterface
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
     * @var \Stellion\Vidaxl\Arguments\GetOrderArguments
     */
    private GetOrderArguments $arguments;

    /**
     * @param \Stellion\Vidaxl\Mode $mode
     * @param \Stellion\Vidaxl\AuthenticationInterface $auth
     * @param \Stellion\Vidaxl\Arguments\GetOrderArguments $arguments
     * @param array $headers
     */
    public function __construct(
        Mode                    $mode,
        AuthenticationInterface $auth,
        GetOrderArguments       $arguments,
        array                   $headers = []
    )
    {
        $this->auth = $auth;
        $this->mode = $mode;
        $this->arguments = $arguments;

        $headers = $this->makeHeaders($headers);

        $uri = $this->makeUri();

        parent::__construct($this->getHttpMethod(), $uri, $headers, version: self::VERSION);
    }

    public function getHttpMethod(): string
    {
        return 'GET';
    }

    public function getEndpoint(): string
    {
        return '/api_customer/orders';
    }

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
     * @return \Stellion\Vidaxl\Arguments\GetOrderArguments
     */
    public function getArguments(): GetOrderArguments
    {
        return $this->arguments;
    }
}