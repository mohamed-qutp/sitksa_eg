<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    use HasFactory;
    protected $fillable = [
        'disk_space',
        'email_accounts',
        'websites',
    ];
}