<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;

class PanelController extends Controller
{
   /**
    * Show the dashboard of admin panel
    *
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
    */
   public function dashboard()
   {
      return view('admin.layouts.panel', [
         'userPostsTotal' => $this->userPostsTotal(),
         'userCommentsTotal' => $this->userCommentsTotal(),
         'userCategoriesTotal' => $this->userCategoriesTotal(),
         'userTagsTotal' => $this->userTagsTotal(),
         'allCategoriesTotal' => $this->allCategoriesTotal(),
         'allCommentsTotal' => $this->allCommentsTotal(),
         'allPostsTotal' => $this->allPostsTotal(),
         'allTagsTotal' => $this->allTagsTotal(),
         'allUsersTotal' => $this->allUsersTotal(),
         'latestUsers' => $this->getLatestUsers(5),
         'latestPosts' => $this->latestPosts(5),
         'latestComments' => $this->latestComments(5),
         'latestTags' => $this->latestTags(5),
         'latestUserPosts' => $this->latestUserPosts(5),
         'latestUserTags' => $this->latestUserTags(5),
         'latestUserCategories' => $this->latestUserCategories(5),
         'latestUserComments' => $this->latestUserComments(5),
      ]);
   }

   /**
    * display user profile page
    *
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
    */
   public function profile()
   {
      return view('admin.layouts.pages.profile');
   }

    /**
     * total number of posts
     * @return int
     */
    public function allPostsTotal(): int
    {
      return Post::all()->count();
   }

    /**
     * total number of comments
     * @return int
     */
    public function allCommentsTotal(): int
   {
      return Comment::all()->count();
   }

    /**
     * total number of tags
     * @return int
     */
    public function allTagsTotal(): int
    {
      return Tag::all()->count();
   }

    /**
     * total number of categories
     * @return int
     */
    public function allCategoriesTotal(): int
    {
      return Category::all()->count();
   }

    /**
     * total number of users
     * @return int
     */
    public function allUsersTotal(): int
    {
      return User::all()->count();
   }

    /**
     * total number of posts by a particular user
     * @return int
     */
    public function userPostsTotal(): int
    {
      return Post::query()->where('user_id', auth()->id())->count();
   }

    /**
     * total number of comments by a particular user
     * @return int
     */
    public function userCommentsTotal(): int
    {
      return Comment::query()->where('user_id', auth()->id())->count();
   }

    /**
     * total number of tags by a particular user
     * @return int
     */
    public function userTagsTotal(): int
    {
      return Tag::query()->where('user_id', auth()->id())->count();
   }

    /**
     * total number of categories by a particular user
     * @return int
     */
    public function userCategoriesTotal(): int
    {
      return Category::where('user_id', auth()->id())->count();
   }

    /**
     * get latest users
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getLatestUsers($number)
   {
      return User::query()->orderBy('id', 'desc')->take($number)->get();
   }

    /**
     * get latest posts
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestPosts($number)
   {
      return Post::query()->orderBy('id', 'desc')->take($number)->get();
   }

    /**
     * get latest comments
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestComments($number)
   {
      return Comment::query()->orderBy('id', 'desc')->take($number)->get();
   }

    /**
     * get latest tags
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestTags($number)
   {
      return Tag::query()->orderBy('id', 'desc')->take($number)->get();
   }

    /**
     * get latest posts by a particular user
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestUserPosts($number)
   {
      return Post::query()
          ->where('user_id', auth()->id())
          ->orderBy('id','desc')
          ->take($number)
          ->get();
   }

    /**
     * get latest tags by a particular user
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestUserTags($number)
   {
      return Tag::query()->where('user_id', auth()->id())->orderBy('id','desc')->take($number)->get();
   }

    /**
     * get latest categories by a particular user
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestUserCategories($number)
   {
      return Category::query()->where('user_id', auth()->id())->orderBy('id','desc')->take($number)->get();
   }

    /**
     * get latest comments by a particular user
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestUserComments($number)
   {
      return Comment::query()->where('user_id', auth()->id())->orderBy('id','desc')->take($number)->get();
   }
}
