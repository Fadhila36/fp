@extends('layouts.login')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group has-feedback">
      <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group has-feedback">
      <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
@endsection
