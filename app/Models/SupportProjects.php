<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportProjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'support_user_id',
    ];
    public function projects()
    {
        return $this->belongsTo(Projects::class,'project_id');
    }

    public function users()
    {
        return $this->belongsTo(SupportUsers::class,'support_user_id');
    }
}
