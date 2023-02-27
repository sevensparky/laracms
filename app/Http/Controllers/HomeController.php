<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\News;
use App\Models\Post;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    /**
     * @description display home page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
    {
        return view('app', [
            'categories' =>  $this->latestCategories(),
            'latestNews' => $this->latestNews(3),
            'latestPosts' => $this->latestPosts(4),
            'latestImages' => $this->latestImages(5),
            'latestVideos' => $this->latestVideos(4),
            'footerRow' => $this->footerRow(),
            'mainNews' => $this->mainNews(),
            'headlineNews' => $this->headlineNews(3),
            'social' => $this->socialRow(),
            'gallery' => $this->galleryItems(3),
            'magazine' => $this->newsMagazine(3)
        ]);
    }

    /**
     * @description
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function faqs()
    {
        return view('partials.faqs', [
            'faqs' => Faq::query()->orderBy('id', 'DESC')->get(),
            'footerRow' => $this->footerRow(),
            'categories' =>  $this->latestCategories(),
            'social' => $this->socialRow(),
            'latestNews' => $this->latestNews(3),


        ]);
    }

    /**
     * get all latest news
     *
     * @param $number
     * @return mixed
     */
    public function latestNews($number)
    {
        return News::query()->whereStatus('active')->take($number)->orderBy('id', 'DESC')->get();
    }

    /**
     * get all related news with category
     *
     * @param $number
     * @param $id
     * @return mixed
     */
    public function relatedNews($number, $id)
    {
        return News::query()->whereStatus('active')
                ->where('category_id', '=', $id)
                ->take($number)
                ->orderBy('id', 'DESC')
                ->get();
    }

    /**
     * @description get all latest posts
     * @param $number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestPosts($number)
    {
        return Post::query()
        ->take($number)
        ->orderBy('id', 'DESC')
        ->get();
    }

    /**
     * get all latest image gallery
     *
     * @param $number
     * @return mixed
     */
    public function latestImages($number)
    {
        return News::query()
        ->whereStatus('active')
        ->where('image', '!=', 'null')
        ->take($number)
        ->orderBy('id', 'DESC')
        ->get();
    }

    /**
     * get all latest videos
     *
     * @param $number
     * @return mixed
     */
    public function latestVideos($number)
    {
        return News::query()
        ->whereStatus('active')
        ->where('video', '!=', 'null')
        ->take($number)
        ->orderBy('id', 'DESC')
        ->get();
    }

    /**
     * get all latest categories
     *
     * @return mixed
     */
    public function latestCategories()
    {
        return Category::query()->whereStatus('active')->get();
    }

    // TODO refactor
    /**
     * @description get
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function footerRow()
    {
        return DB::table('settings')->first();
    }

    /**
     *  get latest gallery items
     *
     * @param $number
     * @return mixed
     */
    public function galleryItems($number)
    {
        return News::query()
                ->where('image', '!=', null)
                ->whereStatus('active')
                ->orderBy('id', 'DESC')
                ->take($number)
                ->get();
    }

    /**
     * get all news magazine items
     *
     * @param $number
     * @return mixed
     */
    public function newsMagazine($number)
    {
        return News::query()
                ->whereMagazine(true)
                ->whereStatus('active')
                ->orderBy('id', 'DESC')
                ->take($number)
                ->get();
    }

    /** @todo refacor
     * the main news column is checked return it
     *
     * @return mixed
     */
    public function mainNews()
    {
        return News::query()
                ->whereStatus('active')
                ->where('main_news', '=', true)
                ->orderBy('id', 'DESC')
                ->first();
    }

    /**
     * @param $number
     * @return mixed
     */
    public function headlineNews($number)
    {
        return News::query()
                ->whereStatus('active')
                ->where('headline_news', '=', true)
                ->take($number)
                ->orderBy('id', 'DESC')
                ->get();
    }

    /**
     * @description search post according to title
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search()
    {
        $search = request()->query('search');
        $posts =  Post::where('title', 'LIKE', "%{$search}%")->get();

        return view('search', compact('posts'));
    }

    //TODO: refactor
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function socialRow()
    {
        return Social::query()->first();
    }

    /**
     * single page for news
     *
     * @param Category $category
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function newsPage(Category $category, News $news)
    {
        $latestNews = $this->latestNews(5);
        $relatedNews = $this->relatedNews(2, $category->id);
        $categories = $this->latestCategories();
        $footerRow = $this->footerRow();
        $social = $this->socialRow();
        $comments = Comment::query()->where('commentable_id', $news->id)->whereStatus('accepted')->get();
        $tags = explode(',', $news->tags[0]);
        return view('partials.sections.news-page', compact(['news', 'latestNews', 'relatedNews', 'categories', 'footerRow', 'social', 'comments', 'tags']));
    }

    /**
     * send comment for post
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function comment(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        Comment::create(array_merge(['user_id' => auth()->user()->id], $request->only('commentable_id', 'commentable_type', 'comment')));
        toast('نظر شما باموفقیت ثبت شد منتظر تایید مدیران باشید', 'success', 'bottom-right')->autoClose(3000);
        return back();
    }


    /**
     * @description display change password page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function changePassword()
    {
        return view('auth.passwords.change-password');
    }

    /**
     * @description change user password
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authChangePassword(Request $request)
    {
        $password = auth()->user()->password;
        $oldPassword = $request->oldPassword;
        $newPassword = $request->password;
        $confirm = $request->password_confirmation;

        if (Hash::check($oldPassword, $password)) {
            if ($newPassword === $confirm) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                toast('رمز عبور با موفقیت تغییر کرد', 'success', 'bottom-right')->autoClose(3000);
                return redirect(route('login'));
            } else {
                toast('رمز عبور با تایید آن مطابقت ندارد', 'error', 'bottom-right')->autoClose(3000);
                return back();
            }
        } else {
            toast('رمز عبور فعلی صحیح نمی باشد', 'error', 'bottom-right')->autoClose(3000);
            return back();
        }
    }

    /**
     * @description a unique page for all news with a specific category
     * @param $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function uniquePage($url)
    {
        $category = Category::query()->where('url', 'LIKE', "%{$url}%")->first();
        $news = News::query()->where('category_id', '=', $category->id)->whereStatus('active')->get();
        $latestNews = $this->latestNews(2);
        $latestPosts = $this->latestPosts(2);
        $categories = $this->latestCategories();
        $footerRow = $this->footerRow();
        $social = $this->socialRow();

        return view('partials.unique', compact('news', 'category', 'latestNews', 'latestPosts', 'categories', 'footerRow', 'social'));
    }

}
