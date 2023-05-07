<?php

namespace SharedKernel\Domain\ValueObject;

/**
 * Class Url
 * @package App\Domain\ValueObject
 */
class Url
{
    /**
     * @var string
     */
    private string $uri;

    /**
     * Site constructor.
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        if (false === filter_var($uri, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException(sprintf('The value "%s" is not an accepted uri', $uri));
        }
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

}