<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomMember;
use App\Models\RoomTag;

class RoomTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_member_id',
        'room_tag_id',
        'amount',
        'description',
    ];

    public function roomMember()
    {
        return $this->belongsTo(RoomMember::class);
    }

    public function roomTag()
    {
        return $this->belongsTo(RoomTag::class);
    }
}
