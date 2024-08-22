<?php

namespace App\Service;

use Domain\Model\FriendModel;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Repository\FriendRepository;
use Infrastructure\Storage\DTO\FriendDTO;
use Infrastructure\Storage\FriendStorage;

class FriendService
{
    public function __construct(
        private FriendStorage    $friendStorage,
        private FriendRepository $friendRepository
    )
    {
    }

    /**
     * @param FriendDTO $friendDTO
     *
     * @return Collection<FriendModel>
     */
    public function make(FriendDTO $friendDTO): Collection
    {
        return $this->friendStorage->makeFriendship($friendDTO);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void
    {
        $this->friendStorage->delete($id);
    }

    /**
     * @param int $id
     *
     * @return FriendModel
     */
    public function getById(int $id): FriendModel
    {
        return $this->friendRepository->getById($id);
    }

    /**
     * @return FriendModel
     */
    public function getList(): FriendModel
    {
        return $this->friendRepository->getList();
    }

    /**
     * @param int $userId
     *
     * @return FriendModel
     */
    public function getByUserId(int $userId): FriendModel
    {
        return $this->friendRepository->getByUserId($userId);
    }

    public function getFriendListByUserId(int $userId): Collection
    {
        return $this->friendRepository->getFriendListByUserId($userId);
    }

    public function getFriendOfFriends(int $userId): Collection
    {
        return $this->friendRepository->getFriendOfFriends($userId);
    }
}
