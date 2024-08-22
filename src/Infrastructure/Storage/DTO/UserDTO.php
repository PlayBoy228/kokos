<?php

namespace Infrastructure\Storage\DTO;

readonly class UserDTO
{
    /**
     * @param string $firstName
     * @param string $lastName
     * @param int $age
     */
    public function __construct(
        private string $firstName,
        private string $lastName,
        private int $age,
    ) {}

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
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}
