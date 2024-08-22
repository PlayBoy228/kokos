<?php

namespace App\Http\Controllers;

use App\Service\FriendService;
use Domain\Model\FriendModel;
use Illuminate\Http\Request;
use Infrastructure\Storage\DTO\FriendDTOHydrator;

class FriendController extends Controller
{
    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    /**
     * @param Request $request
     * @param FriendDTOHydrator $friendDTOHydrator
     *
     * @return void
     */
    public function make(Request $request, FriendDTOHydrator $friendDTOHydrator): void
    {
        $friendDTO = $friendDTOHydrator->hydrate($request);
        $this->friendService->make($friendDTO);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void
    {
        $this->friendService->delete($id);
    }

    public function getById(int $id): FriendModel
    {
        return $this->friendService->getById($id);
    }

    /**
     * @return FriendModel
     */
    public function getList(): FriendModel
    {
        return $this->friendService->getList();
    }

    /**
     * @param int $userId
     *
     * @return FriendModel
     */
    public function getByUserId(int $userId): FriendModel
    {
        return $this->friendService->getByUserId($userId);
    }

    /**
     * @param int $userId
     *
     * @return array
     */
    public function getFriendListByUserId(int $userId): array
    {
        $result = $this->friendService->getFriendListByUserId($userId);

        return $result->toArray();
    }

    public function getFriendOfFriends(int $userId): array
    {
        $result = $this->friendService->getFriendOfFriends($userId);

        return $result->toArray();
    }
}
