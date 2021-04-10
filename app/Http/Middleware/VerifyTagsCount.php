<?php

namespace App\Http\Middleware;

use App\Models\Tag;
use Closure;
use Illuminate\Http\Request;

class VerifyTagsCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Tag::all()->count() == 0) {
            toast('تگی (برچسب) جهت افزودن پست یافت نشد بنابراین شما نمی توانید پست جدیدی ایجاد کنید','error')->autoClose(7000);
            return redirect(route('tags.index'));
        }
        return $next($request);
    }
}
