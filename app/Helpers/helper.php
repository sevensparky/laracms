<?php

use App\Models\News;
use Morilog\Jalali\Jalalian;

/**
 * @param $request
 * @return string|null
 */
function multipleItems($request)
{
    if (empty($request)) {
        $item = null;
    } else {
        foreach ($request as $value) {
            $arrayItems[] = $value;
        }
        $item = implode(',', $arrayItems);
    }

    return $item;
}

/**
 * display defined date format
 *
 * @param $date
 * @return string
 */
function definedDateFormat($date)
{
    $time = Jalalian::forge($date);
    return $time->getYear() . '/' . $time->getMonth() . '/' . $time->getDay();
}

/**
 * for easily handle redirect routes
 *
 * @param str $routeName
 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
 */
function to_route($routeName)
{
    return redirect()->route($routeName);
}

/**
 * count news inside the category
 *
 * @param int $id
 * @return int
 */
function newsCount($id)
{
    return News::query()->whereStatus('active')->where('category_id', '=', $id)->count();
}
