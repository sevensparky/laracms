<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, Sluggable;

    /**
     * to specify those fields which are not mass assignable
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * converting attributes to common data types
     *
     * @var string[]
     */
    protected $casts = [
        'image' => 'array',
        'voice' => 'array',
        'video' => 'array',
        'tags' => 'array'
    ];

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
     public function getRouteKeyName(): string
     {
         return 'slug';
     }

     // TODO: refactor this method, delete or update
    /**
     * @description get
     */
    public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(File::class);
    }

    /**
     * @description get category of news
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @description get author of news
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
