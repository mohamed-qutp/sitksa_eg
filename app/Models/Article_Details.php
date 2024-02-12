<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Details extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'tag',
        'description',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class,'article_id');
    }
}
