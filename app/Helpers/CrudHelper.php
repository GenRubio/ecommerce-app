<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudHelper
{
    public static function getUniqueSlug($objectId, $slug, $model, $i = 0, $first = true)
    {
        $newSlug = $slug = Str::slug($slug);
        $res = $model::where('id', '<>', $objectId)->get()->pluck('slug')->contains(function ($value) use ($slug) {
            return $value == $slug;
        });

        if ($res) {
            $slug = $first ? $slug : substr($slug, 0, strrpos($slug, '-'));
            $slug .= "-" . ++$i;
            $newSlug = self::getUniqueSlug($objectId, $slug, $model, $i, false);
        }

        return $newSlug;
    }
}
