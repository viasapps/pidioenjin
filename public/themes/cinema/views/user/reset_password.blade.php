<div class="col-md-6 col-md-offset-3" >
<div class="well user-header" >
<h3>Reset Password</h3>
</div>
@if ( Session::get('error') )
<div class="alert alert-danger">
@if ( is_array(Session::get('error')) )
{{ head(Session::get('error')) }}
@endif
</div>
@endif
@if ( Session::get('notice') )
<div class="alert alert-warning">{{{ Session::get('notice') }}}</div>
@endif
<div class="well user-body" >
<form method="POST" action="{{{ (Confide::checkAction('UserController@do_reset_password'))    ?: URL::to('/user/reset') }}}" accept-charset="UTF-8">
<input type="hidden" name="token" value="{{{ $token }}}">
{{ Form::token() }}
<div class="form-group">
<label for="password">New Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password">
</div>
<div class="form-group">
<label for="password_confirmation">Confirm Password</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
</div>
<button type="submit" class="btn btn-warning">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
</form>
</div>
</div>