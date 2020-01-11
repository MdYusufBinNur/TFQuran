@extends('admin.admin_master')

@section('title')
    ADMIN HOME
@endsection
@section('body')

    {{--<div id="load"></div>--}}
    <div class="content-wrapper">
        <div class="register-box">
            {{--<div class="register-logo">--}}
            {{--<a href=""><b>Admin</b>LTE</a>--}}
            {{--</div>--}}

            <div class="card register-box-body">
                <p class="login-box-msg"><strong>Register a new membership</strong></p>

                @if(Session::get('confirm_message'))
                    <h4 style="text-align: center" id="msg">{{ Session::get('confirm_message') }}</h4>
                @endif
                <form method="POST" action="{{ route('register_editors') }}">
                    @csrf

                    <div class="form-group has-feedback">
                        <label for="name" class="col-form-label">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="glyphicon glyphicon-envelope form-control-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="glyphicon glyphicon-envelope form-control-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif


                    </div>
                    <div class="form-group has-feedback">

                        <label for="password" class="col-form-label">{{ __('Password') }}</label>


                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="glyphicon glyphicon-lock form-control-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="form-group has-feedback">
                        <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkbox icheck">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" style="color: #ffffff;">
                                {{ __('Register') }}
                            </button>

                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                {{--<a href="{{ route('tfq_admin') }}" class="text-center">I already have a membership</a>--}}
            </div>
            <!-- /.form-box -->
        </div>
    </div>



    <!-- Central Modal Small -->
@endsection



