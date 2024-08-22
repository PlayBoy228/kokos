<?php

namespace Infrastructure\Storage\DTO;

readonly class FriendDTO
{
    public function __construct(
        private int $userId,
        private int $friendId,
    ) {}

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getFriendId(): int
    {
        return $this->friendId;
    }
}
