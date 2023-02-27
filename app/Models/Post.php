<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory,Sluggable;

    /**
     * to specify those fields which are not mass assignable
     *
     * @var array
     */
    protected $guarded = [];

    // TODO: remember
    // protected $casts = [
    //     'image' => 'array'
    // ];

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
   public function getRouteKeyName()
   {
       return 'slug';
   }

    /**
     * @description get category of post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Category::class);
   }

    // TODO: remember
    /**
     * @return mixed
     */
    public function getCategoryNameAttribute()
   {
       return $this->category->name;
   }

    /**
     * @description get all tags of post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
   {
       return $this->belongsToMany(Tag::class);
   }

    /**
     * Does the post have tags
     *
     * @param $tagId
     * @return bool
     */
    public function hasTag($tagId): bool
    {
       return in_array($tagId,$this->tags->pluck('id')->toArray());
   }

    /**
     * @description get creator of post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
   }

    /**
     * @description get comments post
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
       return $this->morphMany(Comment::class, 'commentable');
   }
}
