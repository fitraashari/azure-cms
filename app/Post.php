<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    //
    protected $table="posts";
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'posts_has_tags', 'post_id', 'tag_id');
    }
}
