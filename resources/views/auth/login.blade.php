@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <form class="login" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="login--form{{ $errors->has('email') ? ' has-error' : '' }}">
                        <!-- <label for="email" class="col-md-4 control-label">E-mail Address</label> -->
                        <div class="login--form-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="username" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                            
                    </div>

                    <div class="login--form{{ $errors->has('password') ? ' has-error' : '' }}">
                        <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
                        <div class="login--form-field">
                            <i class="fa fa-lock" aira-hidden="true"></i>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!--<div class="1">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                    </div> -->

                    <button type="submit" class="login--btn">
                        LOGIN
                    </button>

                    <a class="login--forgot" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
