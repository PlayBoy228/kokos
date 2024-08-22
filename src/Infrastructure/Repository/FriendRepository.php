<?php

namespace Infrastructure\Repository;

use Domain\Model\FriendModel;
use Domain\Model\UserModel;
use Illuminate\Database\Eloquent\Collection;

class FriendRepository
{
    /**
     * @param int $id
     *
     * @return FriendModel|null
     */
    public function getById(int $id): ?FriendModel
    {
        /** @var FriendModel $friend */
        $friend = FriendModel::query()->where('id', $id)->first();

        return $friend;
    }

    /**
     * @param int $userId
     *
     * @return FriendModel|null
     */
    public function getByUserId(int $userId): ?FriendModel
    {
        /** @var FriendModel $friend */
        $friend = FriendModel::query()->where('user_id', $userId)->first();

        return $friend;
    }

    /**
     * @return FriendModel
     */
    public function getList(): FriendModel
    {
        /** @var FriendModel $friend */
        $friend = FriendModel::query()->get();

        return $friend;
    }

    /**
     * @param int $userId
     * @return Collection<UserModel>
     */
    public function getFriendListByUserId(int $userId): Collection
    {
        return FriendModel::query()
            ->select('user.*')
            ->join('user', 'user.id', '=', 'friend_pair.friend_id')
            ->where('friend_pair.user_id', $userId)
            ->get();
    }

    /**
     * @param int $userId
     *
     * @return Collection
     */
    public function getFriendOfFriends(int $userId): Collection
    {
        return FriendModel::query()
            ->select('user_friend.*')
            ->join(  'friend_pair as friend_of_friend', 'friend_pair.friend_id', '=', 'friend_of_friend.user_id')
            ->join('user as user_friend', 'friend_of_friend.friend_id', '=', 'user_friend.id')
            ->where('friend_pair.user_id', $userId)
            ->where('user_friend.id', '<>', $userId)
            ->groupBy('user_friend.id')
            ->get();
    }
}
