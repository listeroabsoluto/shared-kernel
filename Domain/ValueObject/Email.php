<?php

namespace SharedKernel\Domain\ValueObject;

/**
 * Class Email
 * @package App\Domain\ValueObject
 */
class Email
{
    /**
     * @var string
     */
    private string $address;

    /**
     * Email constructor.
     * @param string $address
     */
    protected function __construct(string $address)
    {
        if (false === filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(sprintf('The value "%s" is not an accepted email address', $address));
        }
        $this->address = $address;
    }

    /**
     * @param string $address
     * @return Email
     */
    public static function fromAddress(string $address): Email
    {
        return new Email($address);
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->address;
    }

}