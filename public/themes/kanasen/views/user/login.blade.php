		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 class="title">Please Login or Register to Download</h1>
				</div>
			</div>
		</div>
		
		<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
		
		<div class="row">
			<div class="col-sm-6">
				<div class="well bs-component">
					@if ( Session::get('error') )
						<div class="alert alert-warning">
							<p>{{{ Session::get('error') }}}</p>
						</div>						
					@endif

					@if ( Session::get('notice') )
						<div class="alert alert-warning">
							<p>{{{ Session::get('notice') }}}</p>
						</div>
					@endif
					<form class="form-horizontal" method="POST" action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
						<fieldset>
						  <legend><h3>Login</h3></legend>
						  <div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Username or Email</label>
							<div class="col-lg-10">
							  <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}" />
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
							  <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password" />
							  <div class="checkbox">
								<label for="remember">
								  <input type="hidden" name="remember" value="0" />
								  <input type="checkbox" name="remember" id="remember" value="1" /> {{{ Lang::get('confide::confide.login.remember') }}}
								</label>								
							  </div>
							</div>
						  </div>					  
						  <div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.login.submit') }}}</button>
								<small>
									<a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
								</small>
							</div>
						  </div>						  						  
						</fieldset>
					</form>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="well bs-component">
					@if ( Session::get('error') )
						<div class="alert alert-warning">
							<p>
								@if ( is_array(Session::get('error')) )
									{{ head(Session::get('error')) }}
								@endif
							</p>
						</div>						
					@endif
					
					@if ( Session::get('notice') )
						<div class="alert alert-warning">
							<p>{{{ Session::get('notice') }}}</p>
						</div>
					@endif
					<form class="form-horizontal" method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
						<fieldset>
						  <legend><h3>Register</h3></legend>
						  <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />
						  <div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Username</label>
							<div class="col-lg-10">
							  <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}" />
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
							  <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}" />
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
							  <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password" />
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
							<div class="col-lg-10">
							  <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation" />
							</div>
						  </div>						  
						  <div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
							</div>
						  </div>						  						  
						</fieldset>
					</form>
				</div>
			</div>
			
		</div>