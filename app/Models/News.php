<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    protected $casts = [
        'image' => 'array',
        'voice' => 'array',
        'video' => 'array',
    ];

}
