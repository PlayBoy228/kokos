<?php

namespace Infrastructure\Storage;

use Domain\Model\FriendModel;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Storage\DTO\FriendDTO;

class FriendStorage
{
    /**
     * @param FriendDTO $friendDTO
     *
     * @return Collection<FriendModel>
     */
    public function makeFriendship(FriendDTO $friendDTO): Collection
    {
        $friendModel = new FriendModel();
        $friendModel
            ->setFriendId($friendDTO->getFriendId())
            ->setUserId($friendDTO->getUserId())
            ->save();

        $symmetricFriendModel = new FriendModel();
        $symmetricFriendModel
            ->setFriendId($friendDTO->getUserId())
            ->setUserId($friendDTO->getFriendId())
            ->save();

        $friendCollection = new Collection();
        $friendCollection->add($friendModel);
        $friendCollection->add($symmetricFriendModel);

        return $friendCollection;
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void
    {
        FriendModel::query()->where('id', $id)->delete();
    }
}
