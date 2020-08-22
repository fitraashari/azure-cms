@extends('blog.master')
@section('content')
<header class="masthead" style="background-image: url('{{asset('blog/img/head.jpg')}}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
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
        <div class="card shadow-sm m-3 p-1 " >
          <div class="row no-gutters">
            <div class="col-md-4">
              <a href="{{$url[$feed->id]}}">
              <img src="{{$feed->featured}}" class="card-img" alt="...">
              </a>
            </div>
            <div class="col-md-8">
          
          <div class="card-body py-1">
        <div class="post-preview">
        
        <a href="{{$url[$feed->id]}}">
          
          <h3 class="font-weight-bold" style="display:inline;">
            {{$feed->title}}
          </h3>
        
          <h5 class="post-subtitle">
            
              {!! \Illuminate\Support\Str::limit($content[$feed->id], 80, $end='...') !!}


          
          </h5>
        </a>
        <hr class="m-0">
        <p class="post-meta m-0">
        <small>
        Posted by
        <a href="#">{{$feed->user->name}}</a>
        <i class="far fa-clock"></i> {{$feed->created_at->diffforHumans()}}
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
        <div class="card-header">Search</div>
        <div class="card-body">
          <form class="form-inline">
            
            <input type="text" class="form-control mx-sm-2" > <button class="btn-dark btn-sm">Find</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection