<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_id',
        'name_en',
        'name_ar',
        'img_path',
    ];

    public function service()
    {
        return $this->belongsTo(Services::class,'service_id');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class,'client_id');
    }
}
