<?php

namespace App\Http\Controllers;

use app\Service\UserService;
use Domain\Model\UserModel;
use Illuminate\Http\Request;
use Infrastructure\Storage\DTO\UserDTOHydrator;
use Infrastructure\Storage\DTO\UserUpdateDTOHydrator;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @param UserDTOHydrator $userDTOHydrator
     *
     * @return void
     */
    public function make(Request $request, UserDTOHydrator $userDTOHydrator): void
    {
        $this->userService->make($userDTOHydrator->hydrate($request));
    }

    /**
     * @param Request $request
     * @param UserUpdateDTOHydrator $userUpdateDTOHydrator
     *
     * @return void
     */
    public function update(Request $request, UserUpdateDTOHydrator $userUpdateDTOHydrator): void
    {
        $this->userService->update($userUpdateDTOHydrator->hydrate($request));
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    public function delete(Request $request): void
    {
        $this->userService->delete($request->input('id'));
    }

    /**
     * @param int $id
     *
     * @return UserModel
     */
    public function getById(int $id): UserModel
    {
        return $this->userService->getById($id);
    }

    /**
     * @return UserModel
     */
    public function getList(): UserModel
    {
        return $this->userService->getList();
    }
}
