<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Request;

use GuzzleHttp\Psr7\Uri;

trait RequestTrait
{
    public function makeHeaders(array $headers): array
    {
        return array_merge($headers, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $this->getAuthentication()->getAuthorizationHeader(),
        ]);
    }

    /**
     * @return \GuzzleHttp\Psr7\Uri
     */
    public function makeUri(): Uri
    {
        if ($this->getHttpMethod() === 'GET') {
            $orderUrl = rtrim(
                sprintf(
                    '%s?%s',
                    $this->getEndpoint(),
                    $this->getArguments()->asHttpQuery()
                ), '?');
        } else {
            $orderUrl = $this->getEndpoint();
        }

        return new Uri($this->getMode()->getHost() . $orderUrl);
    }

    /**
     * @return string|null
     */
    public function makeBody(): ?string
    {
        if ($this->getHttpMethod() === 'POST') {
            return json_encode($this->getArguments()->toArray()) ?? null;
        }
        return null;
    }

}