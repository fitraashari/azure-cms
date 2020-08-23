<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class IndexController extends Controller
{
    public function index(){
        $posts = Post::all()->sortByDesc('created_at');
        
        //dd($posts);
        $content=[];
        $url=[];
        foreach($posts as $post){
            $content[$post->id] = strip_tags($post->content);
            $url[$post->id] = URL::to('/').'/read/'.\Carbon\Carbon::parse($post->created_at)->format('Y/m').'/'.$post->slug;
        }
        $posts = CollectionHelper::paginate($posts, 5);
        //dd($url);
        return view('index', compact('posts','content','url'));
    }
    public function show($year,$month,$slug){
        $post = Post::where('slug','=',$slug)->first();
        return view('show',compact('post'));
        //dd($post->content);
    }
    public function search(Request $request){
        $posts = Post::where('title','like','%'.$request->keyword.'%')->
        orWhere('content','like','%'.$request->keyword.'%')->
        orderBy('created_at', 'desc')->get();
        
        //dd($posts);
        $content=[];
        $url=[];
        foreach($posts as $post){
            $content[$post->id] = strip_tags($post->content);
            $url[$post->id] = URL::to('/').'/read/'.\Carbon\Carbon::parse($post->created_at)->format('Y/m').'/'.$post->slug;
        }
        $posts = CollectionHelper::paginate($posts, 5);
        //dd($url);
        if (!$posts->isEmpty()) {
            Alert::info('Found', 'Found '.count($posts).' records');
            return view('index', compact('posts','content','url'));
        }else{
            return redirect('/')->with('errors','Not Found');
        }
    }
    public function byYear($year){
        $posts = Post::whereYear('created_at', '=', $year)
              ->whereMonth('created_at', '=', $month)
              ->get();
    }
}
