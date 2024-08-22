<?php

namespace Infrastructure\Storage\DTO;

class UserUpdateDTO
{
    public function __construct(
        private int $id,
        private ?string $firstName = null,
        private ?string $lastName = null,
        private ?int $age = null,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }
}
