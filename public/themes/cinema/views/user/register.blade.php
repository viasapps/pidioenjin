<div class="col-md-6 col-md-offset-3" >
<div class="well user-header" >
<h3>Register</h3>
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
<form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
{{ Form::token() }}
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{{ Input::old('username') }}}">
</div>
<div class="form-group">
<label for="name">Your Name</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{{ Input::old('name') }}}">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{{ Input::old('email') }}}">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password">
</div>
<div class="form-group">
<label for="password_confirmation">Confirm Password</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
</div>
<button type="submit" class="btn btn-warning">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
</form>	
</div> 
</div>