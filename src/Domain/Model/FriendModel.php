<?php

namespace Domain\Model;

use Illuminate\Database\Eloquent\Model;

class FriendModel extends Model
{
    protected $table = 'friend_pair';

    public  $timestamps = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getFriendId(): int
    {
        return $this->friend_id;
    }

    /**
     * @param int $friendId
     *
     * @return $this
     */
    public function setFriendId(int $friendId): self
    {
        $this->friend_id = $friendId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $userId
     *
     * @return $this
     */
    public function setUserId(int $userId): self
    {
        $this->user_id = $userId;

        return $this;
    }
}
