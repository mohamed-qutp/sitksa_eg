<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChatUsers;

class ChatSessions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(ChatUsers::class,'user_id');
    }
}
