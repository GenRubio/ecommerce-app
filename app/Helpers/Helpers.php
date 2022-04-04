<?php

use App\Helpers\CrudHelper;

if (!function_exists('getUniqueSlug')) {
    function getUniqueSlug($objectId, $slug, $model, $i = 0, $first = true)
    {
        return CrudHelper::getUniqueSlug($objectId, $slug, $model, $i, $first);
    }
}