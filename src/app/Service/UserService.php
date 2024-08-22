<?php

namespace app\Service;

use Domain\Model\UserModel;
use Infrastructure\Repository\UserRepository;
use Infrastructure\Storage\DTO\UserDTO;
use Infrastructure\Storage\DTO\UserUpdateDTO;
use Infrastructure\Storage\UserStorage;

class UserService
{
    /**
     * @param UserStorage $userStorage
     * @param UserRepository $userRepository
     */
    public function __construct(
        private UserStorage $userStorage,
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @param UserDTO $dto
     *
     * @return void
     */
    public function make(UserDTO $dto): void
    {
        $this->userStorage->make($dto);
    }

    /**
     * @param UserUpdateDTO $userUpdateDTO
     *
     * @return void
     */
    public function update(UserUpdateDTO $userUpdateDTO): void
    {
        $userModel = $this->userRepository->getById($userUpdateDTO->getId());

        $this->userStorage->update($userModel, $userUpdateDTO);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void
    {
        $this->userStorage->delete($id);
    }

    /**
     * @param int $id
     *
     * @return UserModel
     */
    public function getById(int $id): UserModel
    {
        return $this->userRepository->getById($id);
    }

    /**
     * @return UserModel
     */
    public function getList(): UserModel
    {
        return $this->userRepository->getList();
    }
}
