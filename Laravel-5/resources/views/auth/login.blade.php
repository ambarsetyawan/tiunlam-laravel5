<!DOCTYPE html>
<html lang="en">
  <head>
@include('includes.head')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

<title>Admin Login</title>

  </head>

  <body>

    <div class="container">
{!! Form::open(array('route' => 'login', 'class'=>'form-signin')) !!}
  <div class="form-group @if ($errors->has('username')) has-error @endif">
        <h2 class="form-signin-heading">TI UNLAM</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        {!! Form::text('username', null, array('class'=>'form-control', 'placeholder' => 'Username', 'autofocus')) !!}
        @if ($errors->has('username'))
        <label class="alert alert-danger" style="margin-top:10px">{{ $errors->first('username') }} </label>
        @endif
  </div>
  <div class="form-group @if ($errors->has('password')) has-error @endif">
        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', array('class'=>'form-control', 'placeholder' => 'Password')) !!}
        @if ($errors->has('password'))
        <label class="alert alert-danger">{!! $errors->first('password') !!} </label>
        @endif
  </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" value="remember-me"> Remember me
          </label>
        </div>
        <p>{!! Form::submit('Sign in', array('class'=>'btn btn-lg btn-primary btn-block')) !!}</p>
        <a class="btn btn-lg btn-success btn-block" href="{{ url() }}">{{ trans('menu.back_to_home') }}</a>
        {!! Form::close() !!}
      </form>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>
