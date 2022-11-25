<?php


function multipleItems($request)
{
    if (empty($request)) {
        $item = null;
    }else{
        foreach ($request as $value) {
            $arrayItems[] = $value;
        }
        $item = implode(',', $arrayItems);
    }

    return $item;
}


