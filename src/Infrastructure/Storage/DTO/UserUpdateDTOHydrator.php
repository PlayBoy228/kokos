<?php

namespace Infrastructure\Storage\DTO;

use Illuminate\Http\Request;

class UserUpdateDTOHydrator
{
    public function hydrate(Request $request): UserUpdateDTO
    {
        return new UserUpdateDTO(
            $request->input('id'),
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('age'),
        );
    }
}
