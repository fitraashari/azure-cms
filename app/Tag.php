<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $guarded = [];
    public static function make($arr){
        $tags = explode(',', strtolower($arr));
        $tag_multi = [];
        foreach ($tags as $tag) {
            $tagAss['name'] = trim($tag);
            $tag_multi[] = $tagAss;
        }
        return $tag_multi;
    }
}
