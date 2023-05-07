<?php

namespace SharedKernel\Domain\ValueObject;

class PersonName
{
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;

    /**
     * FullName constructor.
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = (string)$firstName;
        $this->lastName = (string)$lastName;
    }

    /**
     * @return PersonName
     */
    public static function emptyName(): PersonName
    {
        return new PersonName('', '');
    }

    /**
     * @param string $single
     * @return PersonName
     */
    public static function fromSingle(string $single, bool $capitalize = false): PersonName
    {
        $single = trim($single);
        if (substr_count($single, ' ') === 0) {
            if ($capitalize) {
                $single = ucwords(strtolower($single));
            }
            return new PersonName($single, '');
        }

        $names = @explode(' ', $single, 3);
        $count = count($names);
        $last = $names[$count - 1];
        unset($names[$count - 1]);
        $first = join(' ', $names);

        if ($capitalize) {
            $first = ucwords(strtolower($first));
            $last = ucwords(strtolower($last));
        }

        return new PersonName($first, $last);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getFullName();
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return trim(sprintf('%s %s', $this->firstName, $this->lastName));
    }

}