<?php

namespace Infrastructure\Storage\DTO;

use Illuminate\Http\Request;
class FriendDTOHydrator
{
    public function hydrate(Request $request): FriendDTO
    {
        return new FriendDTO(
            $request->input('userId'),
            $request->input('friendId'),
        );
    }
}
