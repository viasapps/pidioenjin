<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
<div class="login-content" style="width:48%; float:left;">
	<div class="main-title">
		<h3>Login</h3>
	</div>
	@if ( Session::get('error') )
		<div class="alert alert-error">{{{ Session::get('error') }}}</div>
	@endif

	@if ( Session::get('notice') )
		<div class="alert">{{{ Session::get('notice') }}}</div>
	@endif
	<form class="well" method="POST" action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
    <table width="99%">
    	<tr><td width="30%">Username or Email</td>
        <td><input class="input" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}"></td></tr>
        <tr><td>Password</td>
        <td><input class="input" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password"></td></tr>
        <tr><td></td><td><label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
			<input type="hidden" name="remember" value="0">
			<input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
		</label></td></tr>
        <tr><td></td><td><button type="submit" class="btn btn-info">{{{ Lang::get('confide::confide.login.submit') }}}</button>
		<small>
			<a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
		</small></td></tr>
    </table>
	</form>	
</div>
<div class="login-content"  style="width:48%; float:right;">
	<div class="main-title">
		<h3>Register</h3>
	</div>
	@if ( Session::get('error') )
		<div class="alert alert-error">
			@if ( is_array(Session::get('error')) )
				{{ head(Session::get('error')) }}
			@endif
		</div>
	@endif

	@if ( Session::get('notice') )
		<div class="alert">{{ Session::get('notice') }}</div>
	@endif
	<form class="well" method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <table width="99%">
    	<tr><td width="30%">Username</td>
        <td><input class="input" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}"></td></tr>
        <tr><td>Email</td>
        <td><input class="input" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}"></td></tr>
        <tr><td>Password</td>
        <td><input class="input" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password"></td></tr>
        <tr><td>Confirm Password</td>
        <td><input class="input" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation"></td></tr>
        <tr><td></td><td><button type="submit" class="btn btn-centered">{{{ Lang::get('confide::confide.signup.submit') }}}</button></td></tr>    
    </table>
	</form>	
</div>
<div style="clear:both"></div>
