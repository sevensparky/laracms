<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory,Sluggable;


    protected $guarded = [];

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



   public function getRouteKeyName()
   {
       return 'slug';
   }


   public function category()
   {
       return $this->belongsTo(Category::class);
   }


   public function getCategoryNameAttribute()
   {
       return $this->category->name;
   }

   public function tags()
   {
       return $this->belongsToMany(Tag::class);
   }


   public function hasTag($tagId)
   {
       return in_array($tagId,$this->tags->pluck('id')->toArray());
   }

   public function comments()
   {
       return $this->morphMany(Comment::class, 'commentable');
   }
   
}
