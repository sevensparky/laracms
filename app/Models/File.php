<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
