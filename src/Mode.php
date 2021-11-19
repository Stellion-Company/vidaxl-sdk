<?php
declare(strict_types=1);

namespace Stellion\Vidaxl;

final class Mode
{
    public const LIVE = 'live';
    public const SANDBOX = 'sandbox';

    private array $modes = [
        self::LIVE,
        self::SANDBOX,
    ];

    private array $hosts = [
        self::LIVE => 'https://b2b.vidaxl.com',
        self::SANDBOX => 'https://sandbox.b2b.vidaxl.com',
    ];

    /**
     * @param string $mode
     */
    public function __construct(string $mode)
    {
        if (!in_array($mode, $this->modes)) {
            throw new \InvalidArgumentException('Invalid mode');
        }

        $this->mode = $mode;
    }

    public static function live(): self
    {
        return new self(self::LIVE);
    }

    public static function sandbox(): self
    {
        return new self(self::SANDBOX);
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return rtrim($this->hosts[$this->mode], '/') ?? '';
    }

    /**
     * @param string $mode
     * @param string $url
     */
    public function addHost(string $mode, string $url): void
    {
        $this->hosts[$mode] = $url;
    }

}