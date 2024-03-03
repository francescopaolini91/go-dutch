<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Services\RoomService;

class RoomController extends Controller
{
    public function __construct(
        private RoomService $roomService
    )
    {
        
    }

    public function store(Request $request): RoomResource
    {
        $room = $this->roomService->store(
            $request->input('user_id'),
            $request->input('title')
        );

        return RoomResource::make($room);
    }
}