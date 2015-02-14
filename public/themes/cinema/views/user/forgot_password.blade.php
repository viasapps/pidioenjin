<div class="col-md-6 col-md-offset-3" >
<div class="well user-header" >
<h3>Forgot Password</h3>
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
<form method="POST" action="{{ (Confide::checkAction('UserController@do_forgot_password')) ?: URL::to('/user/forgot') }}" accept-charset="UTF-8">
{{ Form::token() }}
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{{ Input::old('email') }}}">
</div>
<button type="submit" class="btn btn-warning">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
</form>
</div>
</div>