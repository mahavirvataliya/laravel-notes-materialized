@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s10 offset-s1">
            <div class="collection with-header">
                <div class="collection-header">Login</div>
                <div class="collection-item">
                    <div class="row">
                    <form class="col s12" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                              <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>

                              <label for="email" data-error="wrong email" data-success="Good">E-Mail Address</label>
                              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                              <input id="password" type="password" name="password" required class="validate">
                              <label for="password">Password</label>

                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="col s12">
                            
                                <p>
                                  <input type="checkbox" name="remember" class="filled-in" id="filled-in-box" {{ old('remember') ? 'checked' : '' }} />
                                  <label for="filled-in-box">Remember Me</label>
                                </p>
                        </div>
                        <br>&nbsp; 
                        <br>
                        <div class="col s12">
                            
                                <button type="submit" class="btn green">
                                    Login
                                </button>

                                <a class="btn-flat" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
