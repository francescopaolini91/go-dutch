<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    public function store(int $userId, string $title)
    {
        $room = Room::create([
            'title' => $title,
            'total' => null,
            'endDate' => null
        ]);

        $room->members()->create([
            'user_id' => $userId,
            'is_admin' => true
        ]);
    }
}