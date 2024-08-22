<?php

namespace Infrastructure\Storage;

use Domain\Model\UserModel;
use Infrastructure\Storage\DTO\UserDTO;
use Infrastructure\Storage\DTO\UserUpdateDTO;

class UserStorage
{
    /**
     * @param UserDTO $userDTO
     *
     * @return UserModel
     */
    public function make(UserDTO $userDTO): UserModel
    {
        $user = new UserModel();
        $user
            ->setFirstName($userDTO->getFirstName())
            ->setLastName($userDTO->getLastName())
            ->setAge($userDTO->getAge())
            ->save();

        return $user;
    }

    /**
     * @param UserModel $userModel
     * @param UserUpdateDTO $userUpdateDTO
     *
     * @return void
     */
    public function update(UserModel $userModel, UserUpdateDTO $userUpdateDTO): void
    {
        if ($userUpdateDTO->getFirstName() !== null) {
            $userModel->setFirstName($userUpdateDTO->getFirstName());
        }

        if ($userUpdateDTO->getLastName() !== null) {
            $userModel->setLastName($userUpdateDTO->getLastName());
        }

        if ($userUpdateDTO->getAge()) {
            $userModel->setAge($userUpdateDTO->getAge());
        }

        $userModel->save();
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void
    {
        UserModel::query()->where('id', $id)->delete();
    }
}
