<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Stellion\Vidaxl\AuthenticationInterface;
use Stellion\Vidaxl\Mode;

class GetOrderRequest extends Request
{
    public const VERSION = '1.1';

    /**
     * @param \Stellion\Vidaxl\Mode $mode
     * @param \Stellion\Vidaxl\AuthenticationInterface $auth
     * @param string|null $orderReference
     * @param array $headers
     */
    public function __construct(
        Mode                    $mode,
        AuthenticationInterface $auth,
        ?string                 $orderReference = null,
        array                   $headers = []
    )
    {
        $headers = array_merge($headers, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $auth->getAuthorizationHeader(),
        ]);
        $orderUrl = $orderReference ? sprintf(
            '/api_customer/orders?%s',
            http_build_query(
                [
                    'customer_order_reference_eq' => $orderReference,
                ]
            )) : '/api_customer/orders';

        $uri = new Uri($mode->getHost() . $orderUrl);

        parent::__construct('GET', $uri, $headers, version: self::VERSION);
    }
}