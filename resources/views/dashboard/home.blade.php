@extends('dashboard.sbadmin.master')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-lg-4">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Welcome</h6>
        </div>
        <div class="card-body">
    You are logged in! <br>
                    Name: {{auth()->user()->name}} <br>
                    Username: {{auth()->user()->username}} <br>
                    Email: {{auth()->user()->email}} <br>
                </div>
            </div>
        </div>
        <div class="col-lg">
        <img src="{{asset('sbadmin2/img/dashboard.png')}}" width="100%" height-min="150px" alt="">
        </div>
        </div>
@endsection