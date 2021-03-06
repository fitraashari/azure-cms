@extends('dashboard.sbadmin.master')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Posts</h1>
    <div class="row">
      <div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-header py-3 bg-primary " >
          <h6 class="m-0 font-weight-bold text-light" style="display: inline">Posts Entry</h6>
          <div style="float:right">
          <a href="{{route('posts.create')}}" class="btn btn-sm btn-light"><i class="fas fa-plus-square "></i> New Posts</a>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      
                      <th>Status</th>
                      <th>Posted</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      
                      <th>Status</th>
                      <th>Posted</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($posts as $key => $post)
                        
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$post->title}}</td>
                    
                    {{-- <td>{{$post->user->name}}</td> --}}
                    <td>{{$post->status}}</td>
                    <td>{{$post->created_at->diffforHumans()}}</td>
                    <td>
                    <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>
                    <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                    <form class="d-inline-block" action="{{route('posts.destroy',['post'=>$post->id])}}" method="POST">
                      @csrf
                      @method('DELETE')
  
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                        <i class="fas fa-trash"></i>
                      </button>
                  </form>
                    </td>
                  </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              </div>
            </div>
         
        </div>
        <div class="col-lg">
        <img src="{{asset('sbadmin2/img/post.png')}}" width="100%" height-min="150px" alt="">
        </div>
        </div>
        
@endsection