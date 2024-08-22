<?php

namespace Infrastructure\Storage\DTO;

use Illuminate\Http\Request;
class UserDTOHydrator
{
    public function hydrate(Request $request): UserDTO
    {
        return new UserDTO(
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('age'),
        );
    }
}
