@extends('dashboard.sbadmin.master')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Media</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Files list</h6>
        </div>
        <div class="card-body">
            <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

                </div>
            </div>

@endsection