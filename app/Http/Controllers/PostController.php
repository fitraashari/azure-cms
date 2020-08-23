<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\URL;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('user_id','=',auth()->user()->id)->get();
        return view('dashboard.post.index',compact('posts'));
        //dd($posts[0]->user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $slug = Str::slug($request->title, '-');
        $title = Str::title($request->title);
        
        $validate = Validator::make($request->all(),[
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'tags' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->with('toast_error', "Input Error, Please Try Again")->withErrors($validate)->withInput();
        }
        
        $save = Post::create([
        'title'=>$title,
        'content'=>$request['content'],
        'slug'=>$slug,
        'featured'=>$request['featured'],
        'user_id'=>auth()->user()->id,
        'status'=>$request['status']
        ]);
        $tags = Tag::make($request->tags);
        
        
        foreach ($tags as $tag) {
            $tag_save = Tag::firstOrCreate($tag);
            $save->tag()->attach($tag_save->id);
        }

        return redirect('/dashboard/posts')->with('success', 'Success Post New Entry!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        //dd($post->content);
        $url = URL::to('/').'/read'.'/'.\Carbon\Carbon::parse($post->created_at)->format('Y/m').'/'.$post->slug;
        return view('dashboard.post.show', compact('post','url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        //$tags=[];
        foreach($post->tag as $key => $tag){
            $tags[]=$tag->name;
        }
        $tags=implode(',',$tags);
        //dd($tags);
        return view('dashboard.post.edit',compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $slug = Str::slug($request->title, '-');
        $title = Str::title($request->title);
        
        $validate = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'tags' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->with('toast_error', "Input Error, Please Try Again")->withErrors($validate)->withInput();
        }
        
        $update = Post::where('id','=',$id)->update([
        'title'=>$title,
        'content'=>$request['content'],
        'slug'=>$slug,
        'featured'=>$request['featured'],
        'user_id'=>auth()->user()->id,
        'status'=>$request['status']
        ]);

        $tags = Tag::make($request->tags);
        $post=Post::find($id);
        $post->tag()->detach();
        foreach ($tags as $tag) {
            $tag_save = Tag::firstOrCreate($tag);
            $post->tag()->attach($tag_save->id);
        }
        
        return redirect('/dashboard/posts')->with('success', 'Success Update Post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);
        return redirect('/dashboard/posts')->with('success', 'Success Delete Post!');
    }
}
