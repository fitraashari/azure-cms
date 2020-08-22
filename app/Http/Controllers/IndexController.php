<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\URL;
 
class IndexController extends Controller
{
    public function index(){
        $posts = Post::paginate(5);
        foreach($posts as $post){
            $content[$post->id] = strip_tags($post->content);
            $url[$post->id] = URL::to('/').'/read'.'/'.\Carbon\Carbon::parse($post->created_at)->format('Y/m').'/'.$post->slug;
        }
        //dd($link);
        return view('index', compact('posts','content','url'));
    }
    public function show($year,$month,$slug){
        $post = Post::where('slug','=',$slug)->first();
        return view('show',compact('post'));
        //dd($post->content);
    }
}
