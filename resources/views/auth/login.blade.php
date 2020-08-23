@extends('dashboard.sbadmin.auth')
@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center ">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                    <form method="POST" action="{{ route('login') }}" class="user">
                        @csrf
                        {{-- tampilkan error jika login gagal --}}
                        {{-- @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif --}}

                        <div class="form-group">
                                <input id="username" type="username" class="form-control form-control-user 
                                {{-- @error('username') is-invalid @enderror  --}}
                                " name="username" value="{{ old('username') }}" required autocomplete="username" autofocus aria-describedby="emailHelp" placeholder="Enter Username/Email Address...">

                                {{-- @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            
                        </div>

                        <div class="form-group">
                            
                                <input id="password" type="password" class="form-control form-control-user 
                                {{-- @error('password') is-invalid @enderror  --}}
                                " placeholder="Password" name="password" required autocomplete="current-password">

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                        </div>

                        <div class="form-group">
                            
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>
                        </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>
                    </form><hr>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                        <a class="small" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    </div>
                    <div class="text-center">
                        @if (Route::has('register'))
                        
                            <a class="small" href="{{ route('register') }}">Create an Account!</a>
                        
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
      </div>
  
    
@endsection
    
