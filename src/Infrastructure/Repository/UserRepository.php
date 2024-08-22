<?php

namespace Infrastructure\Repository;

use Domain\Model\UserModel;

class UserRepository
{
    /**
     * @param int $id
     *
     * @return UserModel|null
     */
    public function getById(int $id): ?UserModel
    {
        /** @var UserModel $user */
        $user = UserModel::query()->where('id', $id)->first();

        return $user;
    }

    /**
     * @return UserModel|null
     */
    public function getList(): ?UserModel
    {
        /** @var UserModel $user */
        $user = UserModel::query()->get();

        return $user;
    }

}
