<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomMember;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'total',
        'endDate',
    ];

    public function members()
    {
        return $this->hasMany(RoomMember::class);
    }
}
