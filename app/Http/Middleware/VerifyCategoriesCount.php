<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;

class VerifyCategoriesCount
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
        if (Category::all()->count() == 0) {
            session()->flash('error','!دسته ای جهت افزودن پست یافت نشد بنابراین شما نمی توانید پست جدیدی ایجاد کنید');
            return redirect(route('categories.index'));
        }
        
        return $next($request);
    }
}
