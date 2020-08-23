@extends('blog.master')
@section('content')
<header class="masthead" style="background-image: url('{{asset('blog/img/head.jpg')}}');  background-repeat: no-repeat;
background-attachment: fixed;">
  <div class="overlay"  id="particles-js" style="opacity: 0.8"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <div class="site-heading">
          <h1>Azuryu</h1>
          <span class="subheading">Diamond Is Unbreakable</span>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="container">
<div class="row">
    <div class="col-lg-8">
        @foreach ($posts as $key => $feed)
        <div class="card shadow-sm mb-5 " >
          <div class="card-header bg-light ">
          <a href="{{$url[$feed->id]}}" class="text-secondary">{{$feed->title}}</a>
          <i class="far fa-clock mt-2 float-right text-muted small"> {{$feed->created_at->diffforHumans()}}</i>  
          </div>
          <div class="row no-gutters">
            <div class="col-md-4 p-1 ">
              <a href="{{$url[$feed->id]}}">
              <img src="{{$feed->featured}}" class="card-img img-thumbnail" >
              </a>
            </div>
            <div class="col-md-8">
          
          <div class="card-body py-3">
        <div class="post-preview">
        
        <a href="{{$url[$feed->id]}}">
          
          
        
          <section class="small text-justify">
            
              {!! \Illuminate\Support\Str::limit($content[$feed->id], 150, $end='...') !!}


          
          </section>
        </a>
        <hr class="m-0">
        <p class="post-meta m-0">
        <small >
        Posted by
        <a href="#">{{$feed->user->name}}</a>
        
      </small>
      </p>
      
      </div>
      </div>
      </div>
    </div>
    </div>
      @endforeach
      <!-- Pager -->
      <div class="clearfix d-flex justify-content-end">
        {{ $posts->links() }}
        {{-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> --}}
      </div>
    
    </div>
    <div class="col-lg-4 mx-auto">
      <div class="card shadow-sm">
        <div class="card-header bg-light text-primary">Search</div>
        <div class="card-body">
          <form class="form-inline" action="/search" method="POST">
            @csrf
            <input type="text" class="form-control mx-sm-2" name="keyword" placeholder="Insert Keyword..."> 
            <button class="btn-info btn-sm">Find</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
  </div>
@endsection