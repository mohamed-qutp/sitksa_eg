<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChatUsers;
use App\Models\ChatSessions;

class ChatMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'message',
    ];

    public function users()
    {
        return $this->belongsTo(ChatUsers::class,'user_id');
    }

    public function session()
    {
        return $this->belongsTo(ChatSessions::class,'session_id');
    }
}
