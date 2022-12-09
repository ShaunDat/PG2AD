@extends('auth.layouts.app')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <h3 class="border-bottom">LOGIN</h3>

            <form class="m-t" role="form" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-danger block full-width m-b">Login</button>

                <a href="{{ route('password.request') }}">
                    <small>Forgot password?</small>
                </a>
            </form>

        </div>
    </div>

@endsection()
