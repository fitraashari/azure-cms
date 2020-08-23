@extends('dashboard.sbadmin.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Detail</h1>
<div class="row">
  <div class="col-lg-12">
<div class="card mb-4">
    <div class="card-header py-3" >
      <h6 class="m-0 font-weight-bold text-primary" style="display: inline">{{$post->title}}</h6>
      
      <div style="float:right">
      <i class="fas fa-calendar-alt "></i> {{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}
    </div>
  <br><small>url: <a href="{{$url}}">{{$url}}</a></small>
    </div>
    <div class="card-body">
        {!!$post->content!!}
    </div>
    <div class="card-footer">@foreach ($post->tag as $tag)
      #{{$tag->name}}          
          @endforeach</div>
</div>
  </div>
</div>

@endsection