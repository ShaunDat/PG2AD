@extends('auth.layouts.app')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('logincss/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              {{-- <p class="mb-4">Student management</p> --}}
            </div>
            <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
              <div class="form-group first">
                
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
              </div>
              <div class="form-group last mb-4">
                
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
              </div>

              <button type="submit" class="btn btn-block btn-primary">Login</button>

          
              
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>

@endsection()